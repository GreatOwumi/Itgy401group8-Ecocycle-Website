document.addEventListener("DOMContentLoaded", () => {
  // Select the sidebar menu and active link
  const activeLink = document.querySelector(".sidebar .active");

  // Select the breadcrumb element
  const breadcrumbElement = document.getElementById("breadcrumb");

  if (activeLink) {
    // Find the parent <span> for the active link (category)
    const category = activeLink.closest("li").previousElementSibling;

    // Ensure the breadcrumb only updates if both category and active link are valid
    if (
      category &&
      category.tagName === "LI" &&
      category.querySelector("span")
    ) {
      const categoryName = category.querySelector("span").textContent.trim();
      const linkName = activeLink.textContent.trim();

      // Update breadcrumb dynamically
      breadcrumbElement.innerHTML = `${categoryName} &gt; <span>${linkName}</span>`;
    }
  }
});
