document.addEventListener("DOMContentLoaded", function () {
    const sampleData = [
      {
        id: 1,
        name: "محمد العبدالله",
        phone: "0501234567",
        email: "m.abdullah@example.com",
        specialties: ["القانون التجاري", "قانون الشركات"],
        answeredQuestions: "45 سؤال",
        joinDate: "2024-01-15",
        onlineStatus: true,
        amountSpent: 2500,
        boughtLeads: 23,
        status: true,
      },
      {
        id: 2,
        name: "سارة القحطاني",
        phone: "0502345678",
        email: "s.qahtani@example.com",
        specialties: ["قانون العمل", "القانون المدني"],
        answeredQuestions: "32 سؤال",
        joinDate: "2024-02-20",
        onlineStatus: false,
        amountSpent: 1800,
        boughtLeads: 15,
        status: true,
      },
      // Add more sample lawyers as needed
    ];
  
    const loadingSpinner = document.getElementById("loading");
    const totalLawyers = document.getElementById("totalLawyers");
    const searchInput = document.getElementById("searchInput");
    const tableBody = document.getElementById("tableBody");
    const lawyerModal = document.getElementById("lawyerModal");
    const modalContent = document.getElementById("modalContent");
    const closeModal = document.getElementById("closeModal");
  
    let data = [];
  
    // Simulate loading data
    setTimeout(() => {
      data = sampleData;
      renderTable(data);
      loadingSpinner.classList.add("hidden");
    }, 1000);
  
    // Render table rows
    function renderTable(data) {
      tableBody.innerHTML = data
        .map(
          (lawyer) => `
        <tr class="border-b">
          <td class="p-2">${lawyer.id}</td>
          <td class="p-2">${lawyer.name}</td>
          <td class="p-2">${lawyer.phone}</td>
          <td class="p-2 truncate max-w-[200px]">${lawyer.email}</td>
          <td class="p-2">
            ${lawyer.specialties
              .map(
                (specialty) => `
              <div class="bg-blue-50 p-1 rounded text-sm truncate max-w-[200px] mb-1">
                ${specialty}
              </div>
            `
              )
              .join("")}
          </td>
          <td class="p-2">${new Date(lawyer.joinDate).toLocaleDateString("en-US")}</td>
          <td class="p-2">
            <div class="px-2 py-1 rounded-full text-center text-sm ${
              lawyer.onlineStatus
                ? "bg-green-100 text-green-800"
                : "bg-gray-100 text-gray-800"
            }">
              ${lawyer.onlineStatus ? "متصل" : "غير متصل"}
            </div>
          </td>
          <td class="p-2">${lawyer.answeredQuestions}</td>
          <td class="p-2">${lawyer.amountSpent.toLocaleString()} ريال</td>
          <td class="p-2">${lawyer.boughtLeads}</td>
          <td class="p-2">
            <div class="flex items-center gap-4">
              <button
                onclick="toggleStatus(${lawyer.id})"
                class="relative inline-flex items-center justify-center w-24 h-8 rounded-full transition-all duration-200 focus:outline-none ${
                  lawyer.status ? "bg-green-500" : "bg-gray-200"
                }"
              >
                <span class="absolute z-10 text-xs font-medium transition-all duration-200 ${
                  lawyer.status ? "text-white" : "text-gray-700"
                }">
                  ${lawyer.status ? "نشط" : "غير نشط"}
                </span>
                <span class="absolute w-6 h-6 bg-white rounded-full shadow transition-all duration-200 ${
                  lawyer.status ? "right-1" : "left-1"
                }"></span>
              </button>
              <button
                onclick="showLawyerDetails(${lawyer.id})"
                class="px-4 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors text-sm flex items-center gap-1"
              >
                <i class="fas fa-eye"></i> عرض التفاصيل
              </button>
            </div>
          </td>
        </tr>
      `
        )
        .join("");
      totalLawyers.textContent = data.length;
    }
  
    // Toggle lawyer status
    window.toggleStatus = function (id) {
      data = data.map((lawyer) =>
        lawyer.id === id ? { ...lawyer, status: !lawyer.status } : lawyer
      );
      renderTable(data);
    };
  
    // Show lawyer details modal
    window.showLawyerDetails = function (id) {
      const lawyer = data.find((lawyer) => lawyer.id === id);
      if (lawyer) {
        modalContent.innerHTML = `
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">الرقم التعريفي</p>
              <p class="font-semibold">${lawyer.id}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">الاسم</p>
              <p class="font-semibold">${lawyer.name}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">رقم الهاتف</p>
              <p class="font-semibold">${lawyer.phone}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">البريد الإلكتروني</p>
              <p class="font-semibold">${lawyer.email}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">تاريخ الانضمام</p>
              <p class="font-semibold">${new Date(lawyer.joinDate).toLocaleDateString(
                "en-US"
              )}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">الحالة</p>
              <span class="inline-block px-4 py-1 rounded-full text-sm font-medium ${
                lawyer.status ? "bg-green-100 text-green-800" : "bg-gray-100 text-gray-800"
              }">
                ${lawyer.status ? "نشط" : "غير نشط"}
              </span>
            </div>
          </div>
          <div class="bg-gray-50 p-3 rounded">
            <p class="text-gray-600 mb-2">التخصصات</p>
            <div class="space-y-2">
              ${lawyer.specialties
                .map(
                  (specialty) => `
                <div class="bg-white p-2 rounded shadow-sm">
                  ${specialty}
                </div>
              `
                )
                .join("")}
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">الأسئلة المجاب عليها</p>
              <p class="font-semibold">${lawyer.answeredQuestions}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">المبلغ المنفق</p>
              <p class="font-semibold">${lawyer.amountSpent.toLocaleString()} ريال</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">العملاء المشترى</p>
              <p class="font-semibold">${lawyer.boughtLeads}</p>
            </div>
          </div>
        `;
        lawyerModal.classList.remove("hidden");
      }
    };
  
    // Close modal
    closeModal.addEventListener("click", () => {
      lawyerModal.classList.add("hidden");
    });
  
    // Search functionality
    searchInput.addEventListener("input", (e) => {
      const searchText = e.target.value.toLowerCase();
      const filteredData = sampleData.filter((lawyer) =>
        [
          lawyer.name,
          lawyer.email,
          lawyer.phone,
          lawyer.specialties.join(" "),
        ]
          .join(" ")
          .toLowerCase()
          .includes(searchText)
      );
      renderTable(filteredData);
    });
  
    // Sidebar functionality
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
      if (!sidebar.contains(event.target) && !toggleSidebar.contains(event.target)) {
        sidebar.classList.add("translate-x-full");
      }
    });
  });