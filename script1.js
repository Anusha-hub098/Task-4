let taskList = JSON.parse(localStorage.getItem("tasks")) || [];

function showTasks() {
  let list = document.getElementById("taskList");
  list.innerHTML = "";
  taskList.forEach((task, index) => {
    list.innerHTML += `<li>${task} <button onclick="deleteTask(${index})">❌</button></li>`;
  });
}

function addTask() {
  let input = document.getElementById("taskInput");
  if (input.value.trim() !== "") {
    taskList.push(input.value);
    localStorage.setItem("tasks", JSON.stringify(taskList));
    input.value = "";
    showTasks();
  }
}

function deleteTask(index) {
  taskList.splice(index, 1);
  localStorage.setItem("tasks", JSON.stringify(taskList));
  showTasks();
}

showTasks();
