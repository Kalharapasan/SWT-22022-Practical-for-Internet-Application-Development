document.addEventListener('DOMContentLoaded', () => {
    loadExpenses();
    displayData();
});

document.addEventListener('DOMContentLoaded', loadExpenses);

async function logout() {
  const response = await fetch('php/logout.php', { method: 'POST' });
  const result = await response.json();
  if (result.message === "Logout success!") {
    window.location.href = "index.html";
  } else {
    alert("Logout failed");
  }
}

async function loadExpenses() {
  const response = await fetch('php/view_expenses.php');
  const data = await response.json();
  const expenseTableBody = document.getElementById('expenseTableBody');
  expenseTableBody.innerHTML = '';

  data.records.forEach(expense => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${expense.description}</td>
      <td>${expense.amount}</td>
      <td>
        <button onclick="showEditForm(${expense.id}, '${expense.description}', ${expense.amount})">Edit</button>
        <button onclick="deleteExpense(${expense.id})">Delete</button>
      </td>
    `;
    expenseTableBody.appendChild(row);
  });
}

async function addExpense(event) {
  event.preventDefault();
  const description = document.getElementById('description').value;
  const amount = document.getElementById('amount').value;
  const response = await fetch('php/add_expense.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ description, amount })
  });
  const result = await response.json();
  if (result.message === "Expense added.") {
    loadExpenses();
    document.getElementById('addExpenseForm').reset();
  } else {
    alert("Failed to add expense");
  }
}

async function showEditForm(id, description, amount) {
  document.getElementById('expenseId').value = id;
  document.getElementById('editDescription').value = description;
  document.getElementById('editAmount').value = amount;
  document.getElementById('editForm').style.display = 'block';
}

async function updateExpense(event) {
  event.preventDefault();
  const id = document.getElementById('expenseId').value;
  const description = document.getElementById('editDescription').value;
  const amount = document.getElementById('editAmount').value;
  const response = await fetch('php/edit_expense.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id, description, amount })
  });
  const result = await response.json();
  if (result.message === "Expense updated.") {
    loadExpenses();
    document.getElementById('editForm').style.display = 'none';
  } else {
    alert("Failed to update expense");
  }
}

async function deleteExpense(id) {
  if (confirm("Are you sure you want to delete this expense?")) {
    const response = await fetch('php/delete_expense.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ id })
    });
    const result = await response.json();
    if (result.message === "Expense deleted.") {
      loadExpenses();
    } else {
      alert("Failed to delete expense");
    }
  }
}


function showEditForm(id, description, amount) {
    document.getElementById('expenseId').value = id;
    document.getElementById('editDescription').value = description;
    document.getElementById('editAmount').value = amount;
    document.getElementById('editForm').style.display = 'block';
}


function validateForm(form) {
    const inputs = form.getElementsByTagName('input');
    let isValid = true;

    Array.from(inputs).forEach(input => {
        if (input.hasAttribute('required') && !input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });

    return isValid;
}


// Show registration form
function showRegistration() {
    document.getElementById('registration').style.display = 'block';
    document.getElementById('login').style.display = 'none';
  }
  
  // Show login form
  function showLogin() {
    document.getElementById('login').style.display = 'block';
    document.getElementById('registration').style.display = 'none';
  }
  
  // Register new user
  async function register() {
    const username = document.getElementById('registerUsername').value.trim();
    const email = document.getElementById('registerEmail').value.trim();
    const password = document.getElementById('registerPassword').value.trim();
  
    if (username && email && password) {
      try {
        const response = await fetch('php/register.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ username, email, password })
        });
        const result = await response.json();
        alert(result.message);
        if (result.message === "User was registered.") showLogin();
      } catch (error) {
        console.error('Registration error:', error);
      }
    } else {
      alert("Please fill in all fields.");
    }
  }
  
  // Login user
  async function login() {
    const username = document.getElementById('loginUsername').value.trim();
    const password = document.getElementById('loginPassword').value.trim();
  
    if (username && password) {
      try {
        const response = await fetch('php/login.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ username, password })
        });
        const result = await response.json();
        if (result.message === "Login success") {
          window.location.href = "dashboard.html"; // Redirect to dashboard
        } else {
          alert("Login failed. Check your username and password.");
        }
      } catch (error) {
        console.error('Login error:', error);
      }
    } else {
      alert("Please enter both username and password.");
    }
  }
  