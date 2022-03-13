require("./bootstrap");

document.getElementById("discover")?.addEventListener("click", () => {
    console.log(document?.getElementById("occasions"));
    document?.getElementById("occasions").scrollIntoView({
        behavior: "smooth",
    });
});

document?.getElementById("add-to-cart")?.addEventListener("click", (e) => {
    const {
        caketitle,
        cakeid,
        cakephoto,
        cakedescription,
        cakeprice,
        cakeweight,
        cakecategory,
    } = e.target.dataset;
    const cake = {
        id: cakeid,
        title: caketitle,
        photo: cakephoto,
        description: cakedescription,
        category: cakecategory,
        weight: cakeweight,
        price: cakeprice,
    };
    localStorage.setItem("cake", JSON.stringify(cake));
});
