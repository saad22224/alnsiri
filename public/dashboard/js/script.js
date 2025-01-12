document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const toggleSidebar = document.getElementById("toggleSidebar");
  const closeSidebar = document.getElementById("closeSidebar");

  // Toggle sidebar on button click
  toggleSidebar.addEventListener("click", function () {
    sidebar.classList.toggle("translate-x-full");
  });

  // Close sidebar on close button click
  closeSidebar.addEventListener("click", function () {
    sidebar.classList.add("translate-x-full");
  });

  // Close sidebar when clicking outside of it
  document.addEventListener("click", function (event) {
    if (
      !sidebar.contains(event.target) &&
      !toggleSidebar.contains(event.target)
    ) {
      sidebar.classList.add("translate-x-full");
    }
  });

  // Date formatting for cards
  const today = new Date();
  const weekEnd = new Date(today);
  weekEnd.setDate(today.getDate() + (6 - today.getDay())); // End of the week (Saturday)
  const monthEnd = new Date(today.getFullYear(), today.getMonth() + 1, 0); // Last day of the month

  const formatDate = (date) => {
    const day = String(date.getDate()).padStart(2, "0");
    const month = String(date.getMonth() + 1).padStart(2, "0");
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
  };

  // Update Income Card Dates
  document.getElementById("todayDate").textContent = formatDate(today);
  document.getElementById("weekEndDate").textContent = `حتى ${formatDate(
    weekEnd
  )}`;
  document.getElementById("monthEndDate").textContent = `حتى ${formatDate(
    monthEnd
  )}`;

  // Update Questions Card Dates
  document.getElementById("todayDate2").textContent = formatDate(today);
  document.getElementById("weekEndDate2").textContent = `حتى ${formatDate(
    weekEnd
  )}`;
  document.getElementById("monthEndDate2").textContent = `حتى ${formatDate(
    monthEnd
  )}`;

  // Update Opportunities Card Dates
  document.getElementById("todayDate3").textContent = formatDate(today);
  document.getElementById("weekEndDate3").textContent = `حتى ${formatDate(
    weekEnd
  )}`;
  document.getElementById("monthEndDate3").textContent = `حتى ${formatDate(
    monthEnd
  )}`;
});
