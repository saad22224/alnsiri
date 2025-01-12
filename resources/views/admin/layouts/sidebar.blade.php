
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lawyers Data</title>
    <link
        href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body class="font-['IBM_Plex_Sans_Arabic'] bg-gray-100">

   <!-- Sidebar (icons-only) -->
    <div
      class="fixed inset-y-0 right-0 bg-gray-800 w-16 hidden md:flex flex-col items-center py-4 space-y-4"
    >
      <a href="/" class="text-white hover:text-gray-300 p-2">
        <i class="fas fa-home text-xl"></i>
      </a>
      <a href="/lawyers" class="text-white hover:text-gray-300 p-2">
        <i class="fas fa-balance-scale text-xl"></i>
      </a>
      <a href="/clients" class="text-white hover:text-gray-300 p-2">
        <i class="fas fa-user-tie text-xl"></i>
      </a>
      <a href="/blogs" class="text-white hover:text-gray-300 p-2">
        <i class="fas fa-blog text-xl"></i>
      </a>
      <a href="/questions" class="text-white hover:text-gray-300 p-2">
        <i class="fas fa-question text-xl"></i>
      </a>
      <a href="/leads" class="text-white hover:text-gray-300 p-2">
        <i class="fas fa-lightbulb text-xl"></i>
      </a>
      <a href="/login" class="text-white hover:text-gray-300 p-2">
        <i class="fas fa-sign-in-alt text-xl"></i>
      </a>
      <a href="/register" class="text-white hover:text-gray-300 p-2">
        <i class="fas fa-user-plus text-xl"></i>
      </a>
    </div>

    <!-- Full Sidebar -->
    <div
      id="sidebar"
      class="fixed inset-y-0 right-0 bg-gray-800 text-white w-64 lg:w-72 p-4 transform translate-x-full transition-transform duration-300 z-20"
    >
      <!-- Close Button -->
      <button
        id="closeSidebar"
        class="text-gray-400 focus:outline-none focus:text-white absolute top-4 left-4"
      >
        ✖
      </button>

      <div class="mt-4">
        <h1 class="text-2xl font-bold mb-6">لوحة التحكم</h1>
        <nav class="space-y-4">
          <a
            href="/"
            class="flex gap-2 items-center hover:bg-gray-700 px-4 py-2 rounded"
          >
            <i class="fas fa-home"></i>
            <span>الرئيسية</span>
          </a>
          <a
            href="{{route('lawyers.index')}}"
            class="flex gap-2 items-center hover:bg-gray-700 px-4 py-2 rounded"
          >
            <i class="fas fa-balance-scale"></i>
            <span>المحامين</span>
          </a>
          <a
            href="{{route('clients.index')}}"
            class="flex gap-2 items-center hover:bg-gray-700 px-4 py-2 rounded"
          >
            <i class="fas fa-user-tie"></i>
            <span>العملاء</span>
          </a>
          <a
            href="/blogs.html"
            class="flex gap-2 items-center hover:bg-gray-700 px-4 py-2 rounded"
          >
            <i class="fas fa-blog"></i>
            <span>المدونات</span>
          </a>
          <a
            href="/questions.html"
            class="flex gap-2 items-center hover:bg-gray-700 px-4 py-2 rounded"
          >
            <i class="fas fa-question"></i>
            <span>الاسئله</span>
          </a>
          <a
            href="/leads.html"
            class="flex gap-2 items-center hover:bg-gray-700 px-4 py-2 rounded"
          >
            <i class="fas fa-lightbulb"></i>
            <span>الفرص</span>
          </a>
          <a
            href="/login.html"
            class="flex gap-2 items-center hover:bg-gray-700 px-4 py-2 rounded"
          >
            <i class="fas fa-sign-in-alt"></i>
            <span>تسجيل الدخول</span>
          </a>
          <a
            href="/register.html"
            class="flex gap-2 items-center hover:bg-gray-700 px-4 py-2 rounded"
          >
            <i class="fas fa-user-plus"></i>
            <span>تسجيل جديد</span>
          </a>
        </nav>
      </div>
    </div>

    <!-- Header Content -->
    <div class="flex items-center p-4 gap-5 md:mr-16">
      <div>
        <button
          id="toggleSidebar"
          class="p-2 bg-gray-800 text-white rounded focus:outline-none"
        >
          ☰
        </button>
      </div>
      <div class="bg-blue-500 px-2 py-2 rounded">
        <p class="text-white text-lg font-bold">مرحباً بك أحمد 👋</p>
      </div>
    </div>



