const dropdown_btn = document.querySelector("#dropdown-btn"); // get dropdown button
const dropdown_items = document.querySelector("#dropdown-items"); // get dropdown items

dropdown_btn.addEventListener("click", () => {
    // if it is hidden
    if (dropdown_items.classList.contains("hidden")) {
        dropdown_items.classList.remove("hidden"); // display it onclick
    } else {
        dropdown_items.classList.add("hidden"); // hide it onclick
    }
    dropdown_btn.classList.toggle("open");
});
