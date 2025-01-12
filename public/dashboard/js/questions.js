document.addEventListener("DOMContentLoaded", function () {
    const sampleData = [
      {
        id: 1,
        askedBy: "أحمد محمد",
        question: "ما هي الإجراءات القانونية لتأسيس شركة ذات مسؤولية محدودة؟",
        questionDate: "2024-03-15",
        answeredBy: "محمد العبدالله",
        answer: "يتطلب تأسيس شركة ذات مسؤولية محدودة عدة خطوات...",
        answerDate: "2024-03-16",
        specialty: "القانون التجاري",
        status: "تمت الإجابة",
      },
      {
        id: 2,
        askedBy: "سارة أحمد",
        question: "ما هي حقوقي القانونية في حالة الفصل التعسفي؟",
        questionDate: "2024-03-14",
        answeredBy: null,
        answer: null,
        answerDate: null,
        specialty: "قانون العمل",
        status: "قيد الانتظار",
      },
    ];
  
    const loadingSpinner = document.getElementById("loading");
    const totalQuestions = document.getElementById("totalQuestions");
    const searchInput = document.getElementById("searchInput");
    const tableBody = document.getElementById("tableBody");
    const questionModal = document.getElementById("questionModal");
    const modalContent = document.getElementById("modalContent");
    const closeModal = document.getElementById("closeModal");
    const editModal = document.getElementById("editModal");
    const closeEditModal = document.getElementById("closeEditModal");
    const editForm = document.getElementById("editForm");
    const editQuestion = document.getElementById("editQuestion");
    const editAnswer = document.getElementById("editAnswer");
    const editSpecialty = document.getElementById("editSpecialty");
    const cancelEdit = document.getElementById("cancelEdit");
    const deleteModal = document.getElementById("deleteModal");
    const closeDeleteModal = document.getElementById("closeDeleteModal");
    const cancelDelete = document.getElementById("cancelDelete");
    const confirmDeleteBtn = document.getElementById("confirmDelete");
    const toggleSidebar = document.getElementById("toggleSidebar");
    const fullSidebar = document.getElementById("fullSidebar");
    const closeSidebar = document.getElementById("closeSidebar");
    const iconsSidebar = document.getElementById("iconsSidebar");
  
    let data = [];
    let editingQuestionId = null;
    let questionToDeleteId = null;
  
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
          (question) => `
          <tr class="border-b">
            <td class="p-2">${question.id}</td>
            <td class="p-2">${question.askedBy}</td>
            <td class="p-2">${question.answeredBy || "لم تتم الإجابة بعد"}</td>
            <td class="p-2">${formatDate(question.questionDate)}</td>
            <td class="p-2">${formatDate(question.answerDate)}</td>
            <td class="p-2">
              <div class="bg-blue-50 p-1 rounded text-sm">${question.specialty}</div>
            </td>
            <td class="p-2">
              <div class="px-2 py-1 rounded-full text-center text-sm ${
                question.status === "تمت الإجابة"
                  ? "bg-green-100 text-green-800"
                  : "bg-yellow-100 text-yellow-800"
              }">
                ${question.status}
              </div>
            </td>
            <td class="p-2">
              <div class="flex gap-2">
                <button
                  onclick="showQuestionDetails(${question.id})"
                  class="flex items-center gap-1 px-3 py-1.5 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors border border-blue-500 rounded-lg"
                >
                  <i class="fas fa-eye"></i> عرض
                </button>
                <button
                  onclick="handleEdit(${question.id})"
                  class="flex items-center gap-1 px-3 py-1.5 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition-colors border border-yellow-500 rounded-lg"
                >
                  <i class="fas fa-edit"></i> تعديل
                </button>
                <button
                  onclick="handleDelete(${question.id})"
                  class="flex items-center gap-1 px-3 py-1.5 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors border border-red-500 rounded-lg"
                >
                  <i class="fas fa-trash"></i> حذف
                </button>
              </div>
            </td>
          </tr>
        `
        )
        .join("");
      totalQuestions.textContent = data.length;
    }
  
    // Format date
    function formatDate(date) {
      if (!date) return "لم تتم الإجابة بعد";
      return new Date(date).toLocaleDateString("en-US", {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
      });
    }
  
    // Show question details modal
    window.showQuestionDetails = function (id) {
      const question = data.find((question) => question.id === id);
      if (question) {
        modalContent.innerHTML = `
          <div class="space-y-4">
            <div class="bg-blue-50 p-4 rounded-lg">
              <div class="flex items-center gap-2 mb-3">
                <i class="fas fa-question text-blue-600"></i>
                <h3 class="text-lg font-semibold text-blue-900">السؤال</h3>
              </div>
              <p class="text-blue-800">${question.question}</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg">
              <div class="flex items-center gap-2 mb-3">
                <i class="fas fa-comment text-green-600"></i>
                <h3 class="text-lg font-semibold text-green-900">الإجابة</h3>
              </div>
              <p class="text-green-800">${
                question.answer || "لا يوجد إجابة حتى الآن"
              }</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="bg-gray-50 p-3 rounded">
                <p class="text-gray-600 mb-1">السائل</p>
                <p class="font-semibold">${question.askedBy}</p>
              </div>
              <div class="bg-gray-50 p-3 rounded">
                <p class="text-gray-600 mb-1">المجيب</p>
                <p class="font-semibold">${
                  question.answeredBy || "لا يوجد"
                }</p>
              </div>
            </div>
            <div class="bg-gray-50 p-3 rounded">
              <p class="text-gray-600 mb-1">التخصص</p>
              <div class="bg-white p-2 rounded shadow-sm">
                ${question.specialty}
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="bg-gray-50 p-3 rounded">
                <p class="text-gray-600 mb-1">تاريخ السؤال</p>
                <p class="font-semibold">${formatDate(question.questionDate)}</p>
              </div>
              <div class="bg-gray-50 p-3 rounded">
                <p class="text-gray-600 mb-1">تاريخ الإجابة</p>
                <p class="font-semibold">${formatDate(question.answerDate)}</p>
              </div>
            </div>
          </div>
        `;
        questionModal.classList.remove("hidden");
      }
    };
  
    // Close modal
    closeModal.addEventListener("click", () => {
      questionModal.classList.add("hidden");
    });
  
    // Search functionality
    searchInput.addEventListener("input", (e) => {
      const searchText = e.target.value.toLowerCase();
      const filteredData = sampleData.filter((question) =>
        [
          question.askedBy,
          question.question,
          question.answeredBy || "",
          question.specialty,
          formatDate(question.questionDate),
          formatDate(question.answerDate),
        ]
          .join(" ")
          .toLowerCase()
          .includes(searchText)
      );
      renderTable(filteredData);
    });
  
    // Handle Edit
    window.handleEdit = function (id) {
      const question = data.find((question) => question.id === id);
      if (question) {
        editingQuestionId = id;
        editQuestion.value = question.question;
        editAnswer.value = question.answer || "";
        editSpecialty.value = question.specialty;
        editModal.classList.remove("hidden");
      }
    };
  
    // Close edit modal
    closeEditModal.addEventListener("click", () => {
      editModal.classList.add("hidden");
    });
  
    cancelEdit.addEventListener("click", () => {
      editModal.classList.add("hidden");
    });
  
    // Submit edit form
    editForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const updatedQuestion = {
        id: editingQuestionId,
        question: editQuestion.value,
        answer: editAnswer.value,
        specialty: editSpecialty.value,
      };
      data = data.map((item) =>
        item.id === updatedQuestion.id ? { ...item, ...updatedQuestion } : item
      );
      renderTable(data);
      editModal.classList.add("hidden");
    });
  
    // Handle Delete
    window.handleDelete = function (id) {
      questionToDeleteId = id;
      deleteModal.classList.remove("hidden");
    };
  
    // Close delete modal
    closeDeleteModal.addEventListener("click", () => {
      deleteModal.classList.add("hidden");
    });
  
    cancelDelete.addEventListener("click", () => {
      deleteModal.classList.add("hidden");
    });
  
    // Confirm delete
    confirmDeleteBtn.addEventListener("click", () => {
      data = data.filter((item) => item.id !== questionToDeleteId);
      renderTable(data);
      deleteModal.classList.add("hidden");
    });
  
    // Sidebar functionality
    toggleSidebar.addEventListener("click", () => {
      fullSidebar.classList.toggle("translate-x-full");
      iconsSidebar.classList.toggle("hidden");
    });
  
    closeSidebar.addEventListener("click", () => {
      fullSidebar.classList.add("translate-x-full");
      iconsSidebar.classList.remove("hidden");
    });
  });