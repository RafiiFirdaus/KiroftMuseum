const container = document.getElementById('container');

const registerBtn = document.getElementById('sign')

const loginBtn = document.getElementById('login')

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});