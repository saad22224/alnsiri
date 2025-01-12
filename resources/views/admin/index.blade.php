@extends('admin.layouts.sidebar')

<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard with Sidebar and Cards</title>
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="font-['IBM_Plex_Sans_Arabic'] bg-gray-100">
    <div class="flex">




        <!-- Home Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 px-10 md:px-20 py-10">
          <!-- Income Card -->
          <div
            class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow"
          >
            <div class="flex items-center justify-between mb-4">
              <div class="text-right">
                <h3 class="text-lg font-semibold text-gray-800">الدخل</h3>
                <div class="space-y-2 mt-2">
                  <p class="text-gray-600">
                    يومياً:
                    <span class="text-green-600 font-semibold pl-2"
                      >500 ر.س</span
                    >
                    <span class="text-xs text-gray-500" id="todayDate"></span>
                  </p>
                  <p class="text-gray-600">
                    أسبوعياً:
                    <span class="text-green-600 font-semibold">3,500 ر.س</span>
                    <span
                      class="text-xs text-gray-500 mr-2"
                      id="weekEndDate"
                    ></span>
                  </p>
                  <p class="text-gray-600">
                    شهرياً:
                    <span class="text-green-600 font-semibold">14,000 ر.س</span>
                    <span
                      class="text-xs text-gray-500 mr-2"
                      id="monthEndDate"
                    ></span>
                  </p>
                </div>
              </div>
              <i class="fas fa-coins text-4xl text-green-500"></i>
            </div>
          </div>

          <!-- Questions Card -->
          <div
            class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow"
          >
            <div class="flex items-center justify-between mb-4">
              <div class="text-right">
                <h3 class="text-lg font-semibold text-gray-800">الأسئلة</h3>
                <div class="space-y-2 mt-2">
                  <p class="text-gray-600">
                    يومياً:
                    <span
                      class="text-xs text-gray-500 ml-8"
                      id="todayDate2"
                    ></span>
                    <span class="text-blue-600 font-semibold pl-2">15</span>
                  </p>
                  <p class="text-gray-600">
                    أسبوعياً:
                    <span class="text-blue-600 font-semibold">85</span>
                    <span
                      class="text-xs text-gray-500 mr-2"
                      id="weekEndDate2"
                    ></span>
                  </p>
                  <p class="text-gray-600">
                    شهرياً:
                    <span class="text-blue-600 font-semibold">150</span>
                    <span
                      class="text-xs text-gray-500 mr-2"
                      id="monthEndDate2"
                    ></span>
                  </p>
                </div>
              </div>
              <i class="fas fa-question-circle text-4xl text-blue-500"></i>
            </div>
          </div>

          <!-- Opportunities Card -->
          <div
            class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow"
          >
            <div class="flex items-center justify-between mb-4">
              <div class="text-right">
                <h3 class="text-lg font-semibold text-gray-800">الفرص</h3>
                <div class="space-y-2 mt-2">
                  <p class="text-gray-600">
                    يومياً:
                    <span
                      class="text-xs text-gray-500 ml-8"
                      id="todayDate3"
                    ></span>
                    <span class="text-orange-600 font-semibold pl-2">8</span>
                  </p>
                  <p class="text-gray-600">
                    أسبوعياً:
                    <span class="text-orange-600 font-semibold">45</span>
                    <span
                      class="text-xs text-gray-500 mr-2"
                      id="weekEndDate3"
                    ></span>
                  </p>
                  <p class="text-gray-600">
                    شهرياً:
                    <span class="text-orange-600 font-semibold">85</span>
                    <span
                      class="text-xs text-gray-500 mr-2"
                      id="monthEndDate3"
                    ></span>
                  </p>
                </div>
              </div>
              <i class="fas fa-comments text-4xl text-orange-500"></i>
            </div>
          </div>

          <!-- Lawyers Card -->
          <div
            class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow"
          >
            <div class="flex items-center justify-between mb-4">
              <div class="text-right">
                <h3 class="text-lg font-semibold text-gray-800">المحامين</h3>
                <div class="flex flex-col gap-3 mt-2">
                  <div>
                    <p class="text-3xl font-bold text-purple-600">75</p>
                    <p class="text-sm text-gray-500">إجمالي المحامين</p>
                  </div>
                  <div class="border-t pt-3">
                    <p class="text-3xl font-bold text-indigo-600">250</p>
                    <p class="text-sm text-gray-500">إجمالي العملاء</p>
                  </div>
                </div>
              </div>
              <i class="fas fa-user-plus text-4xl text-purple-500"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Include JavaScript -->
    <script src="{{asset('dashboard/js/script.js')}}"></script>
  </body>
</html>
