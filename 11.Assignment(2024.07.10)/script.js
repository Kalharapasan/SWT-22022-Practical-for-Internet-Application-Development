let selectedBookId = null;

async function add() {
    const title = document.getElementById("title").value;
    const author = document.getElementById("author").value;
    const isbn = document.getElementById("isbn").value;
    const price = document.getElementById("price").value;
    const description = document.getElementById("description").value;

    const response = await fetch('php/insert.php', {
        method: "POST",
        body: JSON.stringify({ title, author, isbn, price, description }),
        headers: { 'Content-Type': 'application/json' }
    });

    const result = await response.json();
    alert(result.message);
    loadBooks();
    clearForm();
}

async function update() {
    if (!selectedBookId) {
        alert("Please select a book to update.");
        return;
    }

    const title = document.getElementById("title").value;
    const author = document.getElementById("author").value;
    const isbn = document.getElementById("isbn").value;
    const price = document.getElementById("price").value;
    const description = document.getElementById("description").value;

    const response = await fetch('php/update.php', {
        method: "POST",
        body: JSON.stringify({ bookId: selectedBookId, title, author, isbn, price, description }),
        headers: { 'Content-Type': 'application/json' }
    });

    const result = await response.json();
    alert(result.message);
    loadBooks();
    clearForm();
}

async function deleteBook() {
    if (!selectedBookId) {
        alert("Please select a book to delete.");
        return;
    }

    const response = await fetch('php/delete.php', {
        method: "POST",
        body: JSON.stringify({ bookId: selectedBookId }),
        headers: { 'Content-Type': 'application/json' }
    });

    const result = await response.json();
    alert(result.message);
    loadBooks();
    clearForm();
}

async function loadBooks() {
    const response = await fetch('php/read.php');
    const books = await response.json();

    const tableBody = document.getElementById("book-table-body");
    tableBody.innerHTML = "";

    books.forEach(book => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${book.book_ID}</td>
            <td>${book.title}</td>
            <td>${book.author}</td>
            <td>${book.ISBN}</td>
            <td>${book.price}</td>
            <td>${book.description}</td>
        `;
        row.addEventListener('click', () => selectBook(row, book));
        tableBody.appendChild(row);
    });
}

function selectBook(row, book) {
    const rows = document.querySelectorAll('#book-table-body tr');
    rows.forEach(r => r.classList.remove('table-active'));
    row.classList.add('table-active');
    selectedBookId = book.book_ID;
    document.getElementById("title").value = book.title;
    document.getElementById("author").value = book.author;
    document.getElementById("isbn").value = book.ISBN;
    document.getElementById("price").value = book.price;
    document.getElementById("description").value = book.description;
    document.getElementById("update-btn").disabled = false;
    document.getElementById("delete-btn").disabled = false;
}

function clearForm() {
    document.getElementById("title").value = '';
    document.getElementById("author").value = '';
    document.getElementById("isbn").value = '';
    document.getElementById("price").value = '';
    document.getElementById("description").value = '';
    document.getElementById("update-btn").disabled = true;
    document.getElementById("delete-btn").disabled = true;
    const rows = document.querySelectorAll('#book-table-body tr');
    rows.forEach(r => r.classList.remove('table-active'));
    selectedBookId = null;
}

window.onload = loadBooks;
