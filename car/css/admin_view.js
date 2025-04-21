// Dummy data for item list and orders
let items = [
    { id: 1, model: "Toyota Camry", type: "Sedan" },
    { id: 2, model: "Ford Explorer", type: "SUV" },
    { id: 3, model: "Porsche 911", type: "Sports" }
];

let orders = [
    { id: "ABC123", userId: "user123", itemId: 1 },
    { id: "DEF456", userId: "user456", itemId: 2 },
    { id: "GHI789", userId: "user789", itemId: 3 }
];

// Function to render the item list
function renderItemList() {
    const itemList = document.getElementById("item-list");
    itemList.innerHTML = "";

    items.forEach(item => {
        const li = document.createElement("li");
        li.textContent = `${item.model} (${item.type})`;
        itemList.appendChild(li);
    });
}

// Function to add a new item
function addItem(event) {
    event.preventDefault();

    const carModel = document.getElementById("car-model").value;
    const carType = document.getElementById("car-type").value;

    // Generate a unique ID for the new item
    const newItemId = Math.max(...items.map(item => item.id)) + 1;

    const newItem = { id: newItemId, model: carModel, type: carType };
    items.push(newItem);

    renderItemList();
    document.getElementById("add-item-form").reset();
}

// Function to trace a user order
function traceOrder(event) {
    event.preventDefault();

    const orderId = document.getElementById("order-id").value;
    const order = orders.find(order => order.id === orderId);

    if (order) {
        alert(`Order ${order.id} is associated with user ${order.userId}`);
    } else {
        alert(`No order found with ID ${orderId}`);
    }

    document.getElementById("order-tracing-form").reset();
}

// Event listeners for form submissions
document.getElementById("add-item-form").addEventListener("submit", addItem);
document.getElementById("order-tracing-form").addEventListener("submit", traceOrder);

// Initial rendering of the item list
renderItemList();


// Function to render the item list
function renderItemList() {
    const itemList = document.getElementById("item-list");
    itemList.innerHTML = "";

    items.forEach(item => {
        const li = document.createElement("li");
        li.textContent = `${item.model} (${item.type})`;

        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.addEventListener("click", () => deleteItem(item.id));

        li.appendChild(deleteButton);
        itemList.appendChild(li);
    });
}

// Function to delete an item
function deleteItem(itemId) {
    items = items.filter(item => item.id !== itemId);
    renderItemList();
}

// Rest of the code...
