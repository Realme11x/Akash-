const socket = io();
const chess = new Chess();
const boardElement = document.querySelector(".chessboard");

let draggedPiece = null;
let sourceSquare = null;
let playerRole = null; // Initialize as null

// Listen for player role from the server
socket.on("playerRole", (role) => {
    playerRole = role;
});

const renderBoard = () => {
    const board = chess.board();
    boardElement.innerHTML = ""; // Clear the board

    board.forEach((row, rowIndex) => {
        row.forEach((square, squareIndex) => {
            const squareElement = document.createElement("div");
            squareElement.classList.add(
                "square",
                (rowIndex + squareIndex) % 2 === 0 ? "light" : "dark"
            );

            squareElement.dataset.row = rowIndex;
            squareElement.dataset.col = squareIndex;

            if (square) {
                const pieceElement = document.createElement("div");
                pieceElement.classList.add(
                    "piece",
                    square.color === "w" ? "white" : "black"
                );

                // Set the correct Unicode for the piece
                pieceElement.innerText = getPieceUnicode(square);

                pieceElement.draggable = playerRole === square.color;

                pieceElement.addEventListener("dragstart", (e) => {
                    if (pieceElement.draggable) {
                        draggedPiece = pieceElement;
                        sourceSquare = { row: rowIndex, col: squareIndex };
                        e.dataTransfer.setData("text/plain", "");
                    }
                });

                pieceElement.addEventListener("dragend", () => {
                    draggedPiece = null;
                    sourceSquare = null;
                });

                squareElement.appendChild(pieceElement); // Add piece to square
            }

            squareElement.addEventListener("dragover", (e) => {
                e.preventDefault(); // Allow drop
            });

            squareElement.addEventListener("drop", (e) => {
                e.preventDefault();
                if (draggedPiece) {
                    const targetSource = {
                        row: parseInt(squareElement.dataset.row),
                        col: parseInt(squareElement.dataset.col),
                    };

                    handleMove(sourceSquare, targetSource);
                }
            });

            boardElement.appendChild(squareElement); // Add square to board
        });
    });

    if (playerRole === 'b') {
        boardElement.classList.add("flipped");
    }
    else {
        boardElement.classList.remove("flipped");
    }
};

const handleMove = (source, target) => {
    const sourceCoord = `${String.fromCharCode(97 + source.col)}${8 - source.row}`;
    const targetCoord = `${String.fromCharCode(97 + target.col)}${8 - target.row}`;

    const move = chess.move({ from: sourceCoord, to: targetCoord });

    if (move) {
        socket.emit("move", move); // Notify the server
        renderBoard(); // Re-render the board after the move
    } else {
        console.log("Invalid move:", sourceCoord, targetCoord);
    }
};

// Function to get the Unicode representation of a piece
const getPieceUnicode = (square) => {
    const unicodeMap = {
        p: "♙", r: "♖", n: "♘", b: "♗", q: "♕", k: "♔",
        P: "♟", R: "♜", N: "♞", B: "♝", Q: "♛", K: "♚",
    };

    return unicodeMap[square.type] || "";
};

socket.on("playerRole", function (role) {
    playerRole = role;
    renderBoard();
});

socket.on("spectatorRole", function (role) {
    playerRole = role;
    renderBoard();
});

socket.on("boardState", function (fen) {
    chess.load(fen);
    renderBoard();
});

socket.on("move", function (move) {
    chess.move(move);
    renderBoard();
});

// Initial board render
renderBoard();
