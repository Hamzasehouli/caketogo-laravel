let cakes = JSON.parse(localStorage.getItem("cakes")) ?? [];
let quantity = 1;

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
        quantity,
    };
    cakes = cakes?.filter((c) => c.id * 1 !== cake.id * 1);
    // const isCakesContainesThisCake = cakes.some(
    //     (c) => c.id * 1 === cake.id * 1
    // );
    // if (isCakesContainesThisCake) return;
    cakes.push(cake);
    localStorage.setItem("cakes", JSON.stringify(cakes));
    location.reload();
});

function decrement(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    // let value = Number(target.value);
    if (quantity === 1) return;
    quantity--;
    target.value = quantity;
}

function increment(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
        'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    // let value = Number(target.value);
    if (quantity === 3) return;
    quantity++;
    target.value = quantity;
}

const decrementButtons = document.querySelectorAll(
    `button[data-action="decrement"]`
);

const incrementButtons = document.querySelectorAll(
    `button[data-action="increment"]`
);

decrementButtons.forEach((btn) => {
    btn.addEventListener("click", decrement);
});

incrementButtons.forEach((btn) => {
    btn.addEventListener("click", increment);
});
