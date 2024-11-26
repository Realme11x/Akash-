const express = require("express");
const socket = require("socket.io");
const http = require("http");
const { Chess } = require("chess.js");
const path = require("path");

const app = express();
const server = http.createServer(app);
const io = socket(server);

const chess = new Chess();
let players = {};
let currentPlayer = "w";

app.set("view engine", "ejs");
app.use(express.static(path.join(__dirname, "public")));

app.get("/", (req, res) => {
    res.render("index", { title: "Chess Game" });
});

io.on("connection", function (uniquesocket) {
    console.log("A user connected:", uniquesocket.id);

    // Assign roles to players
    if (!players.white) {
        players.white = uniquesocket.id;
        uniquesocket.emit("playerRole", "w"); // White player
    } else if (!players.black) {
        players.black = uniquesocket.id;
        uniquesocket.emit("playerRole", "b"); // Black player
    } else {
        uniquesocket.emit("playerRole", "spectator"); // Spectator
    }

    // Listen for "move" events from this socket
    uniquesocket.on("move", (move) => {
        try {
            if (chess.turn() === "w" && uniquesocket.id !== players.white) return;
            if (chess.turn() === "b" && uniquesocket.id !== players.black) return;

            const result = chess.move(move);
            if (result) {
                currentPlayer = chess.turn();
                io.emit("move", move); // Broadcast the move
                io.emit("Boardstate", chess.fen()); // Broadcast the board state
            } else {
                console.log("Invalid move:", move);
                uniquesocket.emit("invalid", move); // Notify sender of invalid move
            }
        } catch (err) {
            console.error("Error processing move:", err);
            uniquesocket.emit("InvalidMove", move);
        }
    });

    // Handle player disconnection
    uniquesocket.on("disconnect", function () {
        console.log("A user disconnected:", uniquesocket.id);
        if (uniquesocket.id === players.white) {
            delete players.white;
        } else if (uniquesocket.id === players.black) {
            delete players.black;
        }
    });
});

server.listen(3000, function () {
    console.log("Listening on port 3000");
});
