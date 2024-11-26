const APIURL =
    "https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&api_key=04c35731a5ee918f014970082a0088b1&page=1";

// this API url is for showing most popular movies at front page(APIURL)

const IMGPATH = "https://image.tmdb.org/t/p/w1280";
const SEARCHAPI ="https://api.themoviedb.org/3/search/movie?&api_key=04c35731a5ee918f014970082a0088b1&query=";
 
       // this API url is for showing search movies (SEARCH API)
    
    const moiveBox = document.querySelector("#movie-box")
    const getMovies = async (api) => {
    const response = await fetch(api)
    const data = await response.json()
    
    showMovies(data.results)
}

const showMovies = (data)=>{
    moiveBox.innerHTML = "";
    // empty the movie box when searching (moiveBox.innerHTML = "";)---this one
data.forEach(
    (item)=>{
 const box = document.createElement("div")
 box.classList.add("box")
 box.innerHTML =`
   <img src="${IMGPATH+item.poster_path}" alt="" />
                <div class="overlay">
                    <div class="title"> 
                        <h2>${item.original_title}</h2>
                        <span>${item.vote_average}<span>
                    </div>
                    <h3>Overview:</h3>
                    <p> 
                       ${item.overview}
                    </p>
                 </div>`
                 moiveBox.appendChild(box)

    }
)
}

document.querySelector("#search").addEventListener(
    "keyup",
    function (event) {
        if (event.target.value != "") {
            getMovies(SEARCHAPI + event.target.value)
        } else {
            getMovies(APIURL);
        }
    }
)

// init or initial call - whenever page get loaded, it calls the function automatically
