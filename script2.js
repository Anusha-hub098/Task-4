let products = [
  { name: "T-Shirt", category: "Clothing", price: 300 },
  { name: "Jeans", category: "Clothing", price: 800 },
  { name: "Headphones", category: "Electronics", price: 2000 },
  { name: "Mouse", category: "Electronics", price: 500 },
];

function display(list) {
  let box = document.getElementById("productList");
  box.innerHTML = "";
  list.forEach(p => {
    box.innerHTML += `<div class="card">
       <h3>${p.name}</h3>
       <p>${p.category}</p>
       <p>₹${p.price}</p>
     </div>`;
  });
}

function filterProducts() {
  let value = document.getElementById("filter").value;
  let filtered = value === "all" ? products : products.filter(p => p.category === value);
  display(filtered);
}

function sortProducts() {
  let value = document.getElementById("sort").value;
  if (value === "low-high") products.sort((a,b) => a.price - b.price);
  else if (value === "high-low") products.sort((a,b) => b.price - a.price);
  display(products);
}

display(products);
