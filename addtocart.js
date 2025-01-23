// JavaScript for Velvet Vogue E-commerce Site

document.addEventListener("DOMContentLoaded", () => {
    // Toggle mobile navigation menu
    const bar = document.getElementById("bar");
    const navbar = document.getElementById("navbar");
    const close = document.getElementById("close");

    if (bar) {
        bar.addEventListener("click", () => {
            navbar.classList.add("active");
        });
    }

    if (close) {
        close.addEventListener("click", () => {
            navbar.classList.remove("active");
        });
    }

    // Handle cart item removal
    const removeIcons = document.querySelectorAll("#cart-close, #close-cart");
    removeIcons.forEach(icon => {
        icon.addEventListener("click", (event) => {
            const row = event.target.closest("tr");
            if (row) {
                row.remove();
                updateSubtotal();
            }
        });
    });

    // Update subtotal when quantity changes
    const quantityInputs = document.querySelectorAll("input[type='number']");
    quantityInputs.forEach(input => {
        input.addEventListener("input", () => {
            const row = input.closest("tr");
            const priceCell = row.querySelector("td:nth-child(4)");
            const subtotalCell = row.querySelector("td:nth-child(6)");
            const price = parseFloat(priceCell.textContent.replace("$", ""));
            const quantity = parseInt(input.value, 10) || 0;

            subtotalCell.textContent = `$${(price * quantity).toFixed(2)}`;
            updateSubtotal();
        });
    });

    // Update total subtotal
    function updateSubtotal() {
        const subtotalCells = document.querySelectorAll("tbody td:nth-child(6)");
        let total = 0;
        subtotalCells.forEach(cell => {
            total += parseFloat(cell.textContent.replace("$", "")) || 0;
        });
        const totalCell = document.querySelector("#subtotal table tr:last-child td:last-child");
        if (totalCell) {
            totalCell.textContent = `$${total.toFixed(2)}`;
        }
    }

    // Add to cart functionality
    const addToCartButtons = document.querySelectorAll(".add-to-cart");
    const cartTableBody = document.querySelector("#cart tbody");

    addToCartButtons.forEach(button => {
        button.addEventListener("click", (event) => {
            const productCard = event.target.closest(".product");
            const productName = productCard.querySelector(".product-name").textContent;
            const productPrice = parseFloat(productCard.querySelector(".product-price").textContent.replace("$", ""));
            const productImage = productCard.querySelector("img").src;

            // Check if product is already in cart
            let existingRow = Array.from(cartTableBody.rows).find(row => row.querySelector("td:nth-child(3)").textContent === productName);

            if (existingRow) {
                const quantityInput = existingRow.querySelector("input[type='number']");
                quantityInput.value = parseInt(quantityInput.value, 10) + 1;
                quantityInput.dispatchEvent(new Event("input"));
            } else {
                // Add new row to cart
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td><i class="fa-regular fa-circle-xmark" id="cart-close"></i></td>
                    <td><img src="${productImage}" alt=""></td>
                    <td>${productName}</td>
                    <td>$${productPrice.toFixed(2)}</td>
                    <td><input type="number" value="1" min="1"></td>
                    <td>$${productPrice.toFixed(2)}</td>
                `;
                cartTableBody.appendChild(newRow);

                // Attach event listeners to new row
                newRow.querySelector("#cart-close").addEventListener("click", () => {
                    newRow.remove();
                    updateSubtotal();
                });
                newRow.querySelector("input[type='number']").addEventListener("input", () => {
                    const quantity = parseInt(newRow.querySelector("input[type='number']").value, 10) || 0;
                    newRow.querySelector("td:nth-child(6)").textContent = `$${(productPrice * quantity).toFixed(2)}`;
                    updateSubtotal();
                });
            }

            updateSubtotal();
        });
    });

    // Coupon functionality placeholder
    const couponButton = document.querySelector("#coupn button");
    couponButton.addEventListener("click", () => {
        alert("Coupon functionality is not implemented yet!");
    });

    // Select all cart buttons
const cartButtons = document.querySelectorAll('.cart');

// Initialize an empty cart array
let cart = [];

// Event listener for each cart button
cartButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        const productElement = button.closest('.pro');
        const product = {
            id: index + 1, // Unique ID for the product
            image: productElement.querySelector('img').src,
            title: productElement.querySelector('h5').innerText,
            price: productElement.querySelector('h4').innerText,
            quantity: 1,
        };

        // Check if product already exists in cart
        const existingProduct = cart.find(item => item.id === product.id);
        if (existingProduct) {
            existingProduct.quantity += 1; // Increment quantity
        } else {
            cart.push(product); // Add new product to cart
        }

        // Save cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
        alert(`${product.title} added to cart!`);
    });
});

// Function to load cart from localStorage (for other pages like cart.html)
function loadCart() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
    }
}
loadCart();
});
