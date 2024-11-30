document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector('header input[type="search"]');
    const filterButtons = document.querySelectorAll('.filters .filter');
    const notifications = document.querySelectorAll('.notification-item');
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');

    // Sidebar toggle animation
    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed'); // Add/remove collapsed state
    });

    // Filter notifications based on search input
    searchInput.addEventListener('input', (event) => {
        const searchTerm = event.target.value.toLowerCase();
        notifications.forEach(notification => {
            const text = notification.querySelector('p').textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                notification.style.display = "flex"; // Show matching notification
            } else {
                notification.style.display = "none"; // Hide non-matching notification
            }
        });
    });

    // Toggle between 'Unread' and 'All' notifications
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove 'active' class from all buttons and add it to the clicked button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            // Filter notifications based on button type
            const filterType = button.textContent.toLowerCase();
            notifications.forEach(notification => {
                const isUnread = notification.classList.contains('active');
                if (filterType === "unread" && !isUnread) {
                    notification.style.display = "none";
                } else {
                    notification.style.display = "flex";
                }
            });
        });
    });
});