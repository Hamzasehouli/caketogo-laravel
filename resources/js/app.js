require("./bootstrap");

document.getElementById("discover").addEventListener("click", () => {
    console.log(document?.getElementById("occasions"));
    document?.getElementById("occasions").scrollIntoView({
        behavior: "smooth",
    });
});
