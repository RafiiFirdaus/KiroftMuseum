<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kiroft Museum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #393733;
            --secondary-color: #afa597;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            z-index: 1000;
            overflow-y: auto;
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin: 0.25rem 0;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.1);
            color: white;
        }

        .card {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            border-radius: 12px;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 12px 12px 0 0 !important;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .stats-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="p-3">
            <h4>
                <a href="/" style="color: white; text-decoration: none; cursor: pointer; transition: all 0.3s;"
                   onmouseover="this.style.color='rgba(255,255,255,0.8)'"
                   onmouseout="this.style.color='white'">
                    <i class="fas fa-university me-2"></i>Kiroft Museum
                </a>
            </h4>
            <hr class="text-light">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="showSection('dashboard')">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showSection('purchases')">
                        <i class="fas fa-history me-2"></i>Purchase History
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showSection('profile')">
                        <i class="fas fa-user me-2"></i>Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="logout()">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="p-4">
                    <!-- Dashboard Section -->
                    <div id="dashboardSection" class="content-section">
                        <h2 class="mb-4">Dashboard</h2>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card stats-card">
                                    <div class="card-body text-center">
                                        <i class="fas fa-ticket-alt fa-2x mb-3"></i>
                                        <h5>Total Purchases</h5>
                                        <h3 id="totalPurchases">-</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card stats-card">
                                    <div class="card-body text-center">
                                        <i class="fas fa-calendar-check fa-2x mb-3"></i>
                                        <h5>Upcoming Visits</h5>
                                        <h3 id="upcomingVisits">-</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card stats-card">
                                    <div class="card-body text-center">
                                        <i class="fas fa-money-bill-wave fa-2x mb-3"></i>
                                        <h5>Total Expenses</h5>
                                        <h3 id="totalSpent">-</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Purchases Section -->
                    <div id="purchasesSection" class="content-section" style="display: none;">
                        <h2 class="mb-4">Purchase History</h2>
                        <div id="purchasesList">
                            <!-- Purchases will be loaded here -->
                        </div>
                    </div>

                    <!-- Profile Section -->
                    <div id="profileSection" class="content-section" style="display: none;">
                        <h2 class="mb-4">User Profile</h2>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Profile Information</h5>
                            </div>
                            <div class="card-body">
                                <form id="profileForm">
                                    <div class="mb-3">
                                        <label for="profileName" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="profileName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="profileEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="profileEmail">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </form>
                            </div>
                        </div>

                        <!-- Delete Account Section -->
                        <div class="card mt-4 border-danger">
                            <div class="card-header bg-danger text-white">
                                <h5 class="mb-0">
                                    <i class="fas fa-exclamation-triangle me-2"></i>Danger Zone
                                </h5>
                            </div>
                            <div class="card-body">
                                <h6 class="text-danger">Delete Account</h6>
                                <p class="text-muted mb-3">
                                    Once you delete your account, there is no going back. This will permanently delete your account,
                                    all your purchase history, and remove all associated data. Please be certain.
                                </p>
                                <button type="button" class="btn btn-outline-danger" onclick="showDeleteConfirmation()">
                                    <i class="fas fa-trash-alt me-2"></i>Delete Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Delete Account Confirmation Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-danger">
                    <h5 class="modal-title text-danger" id="deleteAccountModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i>Confirm Account Deletion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <strong>Warning!</strong> This action cannot be undone.
                    </div>
                    <p>Are you absolutely sure you want to delete your account? This will:</p>
                    <ul class="text-danger">
                        <li>Permanently delete your account</li>
                        <li>Remove all your purchase history</li>
                        <li>Cancel any upcoming visits</li>
                        <li>Delete all associated personal data</li>
                    </ul>
                    <hr>
                    <div class="mb-3">
                        <label for="confirmationText" class="form-label">
                            Type <strong>"DELETE MY ACCOUNT"</strong> to confirm:
                        </label>
                        <input type="text" class="form-control" id="confirmationText" placeholder="DELETE MY ACCOUNT">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn" disabled onclick="deleteAccount()">
                        <i class="fas fa-trash-alt me-2"></i>Delete My Account
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Container -->
    <div id="alertContainer" style="position: fixed; top: 20px; right: 20px; z-index: 9999;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const API_BASE = '/api';
        let currentUser = null;
        let currentPurchases = [];

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            checkAuth();
            loadUserData();
        });

        function checkAuth() {
            const token = localStorage.getItem('auth_token');
            if (!token) {
                window.location.href = '/auth';
                return;
            }
        }

        async function loadUserData() {
            try {
                const response = await apiCall('/user');
                if (response.ok) {
                    const data = await response.json();
                    currentUser = data.user;

                    // Update localStorage with latest user data
                    localStorage.setItem('user', JSON.stringify(currentUser));

                    document.getElementById('profileName').value = currentUser.name;
                    document.getElementById('profileEmail').value = currentUser.email;
                    loadDashboardStats();
                }
            } catch (error) {
                console.error('Error loading user data:', error);
            }
        }

        async function loadDashboardStats() {
            try {
                const response = await apiCall('/purchases');
                if (response.ok) {
                    const data = await response.json();
                    currentPurchases = data.purchases;

                    const totalPurchases = currentPurchases.length;
                    const upcomingVisits = currentPurchases.filter(p =>
                        new Date(p.visit_date) > new Date() && p.status !== 'cancelled'
                    ).length;
                    const totalSpent = currentPurchases
                        .filter(p => p.status !== 'cancelled')
                        .reduce((sum, p) => sum + parseFloat(p.total_price), 0);

                    document.getElementById('totalPurchases').textContent = totalPurchases;
                    document.getElementById('upcomingVisits').textContent = upcomingVisits;
                    document.getElementById('totalSpent').textContent = formatCurrency(totalSpent);
                }
            } catch (error) {
                console.error('Error loading dashboard stats:', error);
            }
        }

        async function loadPurchases() {
            try {
                const response = await apiCall('/purchases');
                if (response.ok) {
                    const data = await response.json();
                    currentPurchases = data.purchases;
                    displayPurchases();
                }
            } catch (error) {
                console.error('Error loading purchases:', error);
            }
        }

        function displayPurchases() {
            const container = document.getElementById('purchasesList');
            container.innerHTML = '';

            if (currentPurchases.length === 0) {
                container.innerHTML = '<p class="text-muted">No purchase history yet.</p>';
                return;
            }

            currentPurchases.forEach(purchase => {
                const statusBadge = getStatusBadge(purchase.status);
                const canCancel = purchase.status !== 'cancelled' && new Date(purchase.visit_date) > new Date();

                const purchaseCard = `
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <h6>${purchase.museum_name || 'Museum 10 Nopember'}</h6>
                                    <p class="mb-1"><strong>Ticket Type:</strong> ${purchase.ticket_type || 'General'}</p>
                                    <p class="mb-1"><strong>Quantity:</strong> ${purchase.quantity} tickets</p>
                                    <p class="mb-1"><strong>Visit Date:</strong> ${formatDate(purchase.visit_date)}</p>
                                    <p class="mb-1"><strong>Total:</strong> ${formatCurrency(purchase.total_price)}</p>
                                    <p class="mb-0"><strong>Status:</strong> ${statusBadge}</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <small class="text-muted">Purchased: ${formatDateTime(purchase.created_at)}</small>
                                    ${canCancel ? `<br><button class="btn btn-sm btn-outline-danger mt-2" onclick="cancelPurchase(${purchase.id})">Cancel</button>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += purchaseCard;
            });
        }

        async function cancelPurchase(purchaseId) {
            if (!confirm('Are you sure you want to cancel this purchase?')) return;

            try {
                const response = await apiCall(`/purchases/${purchaseId}/cancel`, 'PUT');

                if (response.ok) {
                    showAlert('Purchase cancelled successfully!', 'success');
                    loadPurchases();
                    loadDashboardStats();
                } else {
                    const error = await response.json();
                    showAlert(error.message || 'Failed to cancel purchase!', 'danger');
                }
            } catch (error) {
                showAlert('Network error occurred!', 'danger');
                console.error('Cancel error:', error);
            }
        }

        async function updateProfile(event) {
            event.preventDefault();

            const name = document.getElementById('profileName').value;
            const email = document.getElementById('profileEmail').value;

            try {
                const response = await apiCall('/user', 'PUT', { name, email });

                if (response.ok) {
                    showAlert('Profile updated successfully!', 'success');
                    loadUserData();
                } else {
                    const error = await response.json();
                    showAlert(error.message || 'Failed to update profile!', 'danger');
                }
            } catch (error) {
                showAlert('Network error occurred!', 'danger');
                console.error('Update profile error:', error);
            }
        }

        async function logout() {
            // Show confirmation dialog
            const confirmLogout = confirm('Are you sure you want to log out?');
            if (!confirmLogout) {
                return; // Cancel logout if user clicks "Cancel"
            }

            try {
                await apiCall('/logout', 'POST');
            } catch (error) {
                console.error('Logout error:', error);
            } finally {
                localStorage.removeItem('auth_token');
                localStorage.removeItem('user');
                window.location.href = '/auth';
            }
        }

        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(s => s.style.display = 'none');
            // Remove active class from all nav links
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));

            // Show selected section
            document.getElementById(section + 'Section').style.display = 'block';
            // Add active class to clicked nav link
            event.target.classList.add('active');

            // Load data based on section
            if (section === 'purchases') {
                loadPurchases();
            }
        }

        // Utility Functions
        async function apiCall(endpoint, method = 'GET', data = null) {
            const token = localStorage.getItem('auth_token');
            const options = {
                method,
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            };

            if (data && method !== 'GET') {
                options.body = JSON.stringify(data);
            }

            return fetch(`${API_BASE}${endpoint}`, options);
        }

        function showAlert(message, type = 'info') {
            const alertContainer = document.getElementById('alertContainer');
            const alertId = 'alert_' + Date.now();
            alertContainer.innerHTML += `
                <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;

            // Auto remove after 5 seconds
            setTimeout(() => {
                const alert = document.getElementById(alertId);
                if (alert) alert.remove();
            }, 5000);
        }

        function formatCurrency(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(amount);
        }

        function formatDate(dateString) {
            return new Date(dateString).toLocaleDateString('id-ID');
        }

        function formatDateTime(dateString) {
            return new Date(dateString).toLocaleString('id-ID');
        }

        function getStatusBadge(status) {
            const badges = {
                'pending': '<span class="badge bg-warning">Pending</span>',
                'completed': '<span class="badge bg-success">Completed</span>',
                'cancelled': '<span class="badge bg-danger">Cancelled</span>'
            };
            return badges[status] || '<span class="badge bg-secondary">Unknown</span>';
        }

        // Delete Account Functions
        function showDeleteConfirmation() {
            const modal = new bootstrap.Modal(document.getElementById('deleteAccountModal'));
            modal.show();

            // Reset confirmation text
            document.getElementById('confirmationText').value = '';
            document.getElementById('confirmDeleteBtn').disabled = true;
        }

        function validateConfirmationText() {
            const confirmationText = document.getElementById('confirmationText').value;
            const deleteBtn = document.getElementById('confirmDeleteBtn');

            if (confirmationText === 'DELETE MY ACCOUNT') {
                deleteBtn.disabled = false;
                deleteBtn.classList.remove('btn-outline-danger');
                deleteBtn.classList.add('btn-danger');
            } else {
                deleteBtn.disabled = true;
                deleteBtn.classList.remove('btn-danger');
                deleteBtn.classList.add('btn-outline-danger');
            }
        }

        async function deleteAccount() {
            try {
                // Show loading state
                const deleteBtn = document.getElementById('confirmDeleteBtn');
                const originalText = deleteBtn.innerHTML;
                deleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Deleting...';
                deleteBtn.disabled = true;

                const response = await apiCall('/user', 'DELETE');

                if (response.ok) {
                    // Close modal
                    bootstrap.Modal.getInstance(document.getElementById('deleteAccountModal')).hide();

                    // Show success message
                    showAlert('Account deleted successfully. You will be redirected...', 'success');

                    // Clear storage and redirect after 2 seconds
                    setTimeout(() => {
                        localStorage.removeItem('auth_token');
                        localStorage.removeItem('user');
                        window.location.href = '/';
                    }, 2000);
                } else {
                    const error = await response.json();
                    showAlert(error.message || 'Failed to delete account!', 'danger');

                    // Restore button
                    deleteBtn.innerHTML = originalText;
                    deleteBtn.disabled = false;
                }
            } catch (error) {
                showAlert('Network error occurred!', 'danger');
                console.error('Delete account error:', error);

                // Restore button
                const deleteBtn = document.getElementById('confirmDeleteBtn');
                deleteBtn.innerHTML = '<i class="fas fa-trash-alt me-2"></i>Delete My Account';
                deleteBtn.disabled = false;
            }
        }

        // Event Listeners
        document.getElementById('profileForm').addEventListener('submit', updateProfile);
        document.getElementById('confirmationText').addEventListener('input', validateConfirmationText);
    </script>
</body>
</html>
