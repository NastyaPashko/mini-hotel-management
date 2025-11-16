const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");
const closeBtn = document.getElementById("closeSidebar");
const openBtn = document.getElementById("openSidebar");


// Закрити sidebar
closeBtn.addEventListener("click", () => {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
    document.documentElement.body.classList.remove("no-scroll");

});
openBtn.addEventListener("click", () => {
    sidebar.classList.add("active");
    overlay.classList.add("active");
    document.documentElement.body.classList.add("no-scroll");
});

