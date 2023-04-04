const search = document.querySelector('#search');
const remove = document.querySelector('#remove');
const ul = document.querySelector(".nav_li ul");
const input = document.querySelector(".input_search");

search.onclick = ()=>{
    ul.style.display = "none";
    input.style.display = "flex";
}

remove.onclick = ()=>{
    ul.style.display = "flex";
    input.style.display = "none";
}