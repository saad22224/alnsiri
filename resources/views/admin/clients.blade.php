<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clients Data</title>
    <link
        href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
</head>

<body class="font-['IBM_Plex_Sans_Arabic'] bg-gray-100">
    @extends('admin.layouts.sidebar')

    <!-- Main Content -->
    <div class="rtl p-2 md:pr-24 md:pl-6 lg:px-28">
        <!-- Clients Count Card -->

        <div class="mb-4 bg-white shadow-sm rounded-lg p-4">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i class="fas fa-user text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-600">إجمالي العملاء</p>
                    <h2 id="totalClients" class="text-2xl font-bold">{{$clients->count()}}</h2>
                </div>
            </div>
        </div>

        <!-- Search Input -->
        <div class="mb-4">
            <input
                id="searchInput"
                type="text"
                placeholder="البحث في جميع الحقول"
                class="w-full md:w-64 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <!-- Clients Table -->
        <div class="overflow-x-auto">
            <table id="clientsTable" class="w-full whitespace-nowrap">
                <thead>

                    <tr class="bg-gray-100">
                        <th class="p-2">الرقم التعريفي</th>
                        <th class="p-2">الاسم</th>
                        <th class="p-2">رقم الهاتف</th>
                        <th class="p-2">البريد الإلكتروني</th>
                        <th class="p-2">الأسئلة</th>
                        <th class="p-2">الفرص</th>
                        <th class="p-2">الإجراءات</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="text-sm">
                    <!-- ثابتة -->

                    @foreach($clients as $index => $client)
                    <tr class="border-b client" data-name="{{ $client->name }}" data-phone="{{ $client->phone }}" data-email="{{ $client->email }}">
                        <td class="p-2">{{$index + 1 }}</td>
                        <td class="p-2 name">{{ $client->name }}</td>
                        <td class="p-2 phone">{{ $client->phone }}</td>
                        <td class="p-2 truncate email max-w-[200px]">{{ $client->email }}</td>
                        <td class="p-2">
                            <div class="bg-gray-50 p-1 rounded text-sm truncate max-w-[300px] mb-1">
                                1. كيف يمكنني تحسين أداء شركتي؟
                            </div>
                            <div class="bg-gray-50 p-1 rounded text-sm truncate max-w-[300px] mb-1">
                                2. ما هي أفضل طرق التسويق؟
                            </div>
                        </td>
                        <td class="p-2">
                            <div class="bg-blue-50 p-1 rounded text-sm truncate max-w-[300px] mb-1">
                                1. استشارات تسويقية
                            </div>
                            <div class="bg-blue-50 p-1 rounded text-sm truncate max-w-[300px] mb-1">
                                2. تطوير استراتيجي
                            </div>
                        </td>
                        <td class="p-2">
                            <div class="flex items-center gap-4">
                                <button
                                    onclick="toggleStatus(1)"
                                    class="relative inline-flex items-center justify-center w-24 h-8 rounded-full transition-all duration-200 focus:outline-none bg-green-500"
                                    id="toggleButton-1">
                                    <span id="statusText-1" class="absolute z-10 text-xs font-medium transition-all duration-200 text-white">
                                        نشط
                                    </span>
                                    <span id="buttonIcon-1" class="absolute w-6 h-6 bg-white rounded-full shadow transition-all duration-200 right-1"></span>
                                </button>
                                <!-- زر عرض التفاصيل -->
                                <button
                                    onclick="showClientDetails({{ $client->id }})"
                                    class="px-4 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors text-sm flex items-center gap-1">
                                    <i class="fas fa-eye"></i> عرض التفاصيل
                                </button>

                                <!-- Modal Container (مخفي افتراضيًا) -->
                                <div id="clientModal{{ $client->id }}" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center">
                                    <div class="bg-white p-6 rounded-md shadow-lg max-w-4xl w-full">
                                        <!-- محتوى الـ Modal -->
                                        <div id="modalContent{{ $client->id }}">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div class="bg-gray-50 p-3 rounded">
                                                    <p class="text-gray-600 mb-1">الرقم التعريفي</p>
                                                    <p class="font-semibold" id="clientId{{$client->id}}">{{$client->id}}</p> <!-- سيتم تحديثه بالـ ID -->
                                                </div>
                                                <div class="bg-gray-50 p-3 rounded">
                                                    <p class="text-gray-600 mb-1">الاسم</p>
                                                    <p class="font-semibold">{{$client->name}}</p> <!-- استبدل باسم العميل -->
                                                </div>
                                                <div class="bg-gray-50 p-3 rounded">
                                                    <p class="text-gray-600 mb-1">رقم الهاتف</p>
                                                    <p class="font-semibold">{{$client->phone}}</p> <!-- استبدل برقم الهاتف -->
                                                </div>
                                                <div class="bg-gray-50 p-3 rounded">
                                                    <p class="text-gray-600 mb-1">البريد الإلكتروني</p>
                                                    <p class="font-semibold">{{$client->email}}</p> <!-- استبدل بالبريد الإلكتروني -->
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 p-3 rounded mt-4">
                                                <p class="text-gray-600 mb-2">الأسئلة</p>
                                                <div class="space-y-2">
                                                    <div class="bg-white p-2 rounded shadow-sm">
                                                        1. كيف يمكنني تحسين أداء شركتي؟
                                                    </div>
                                                    <div class="bg-white p-2 rounded shadow-sm">
                                                        2. ما هي أفضل طرق التسويق؟
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 p-3 rounded mt-4">
                                                <p class="text-gray-600 mb-2">الفرص</p>
                                                <div class="space-y-2">
                                                    <div class="bg-white p-2 rounded shadow-sm">
                                                        1. استشارات تسويقية
                                                    </div>
                                                    <div class="bg-white p-2 rounded shadow-sm">
                                                        2. تطوير استراتيجي
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 p-3 rounded mt-4">
                                                <p class="text-gray-600 mb-1">الحالة</p>
                                                <span class="inline-block px-4 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                    نشط
                                                </span>
                                            </div>
                                        </div>

                                        <!-- زر إغلاق الـ Modal -->
                                        <button onclick="closeModal({{ $client->id }})" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md">
                                            إغلاق
                                        </button>
                                    </div>
                                </div>

                                <script>
                                    // دالة عرض التفاصيل
                                    function showClientDetails(id) {
                                        const clientModal = document.getElementById(`clientModal${id}`);
                                        const modalContent = document.getElementById(`modalContent${id}`);

                                        // إظهار الـ Modal فقط للـ client الذي تم اختياره
                                        if (clientModal) {
                                            clientModal.classList.remove('hidden');
                                        }

                                        // إرسال الـ ID إلى الخادم (يمكنك استخدام fetch أو axios هنا)
                                        sendIdToServer(id);
                                    }

                                    // دالة إغلاق الـ Modal
                                    function closeModal(id) {
                                        const clientModal = document.getElementById(`clientModal${id}`);
                                        if (clientModal) {
                                            clientModal.classList.add('hidden'); // إخفاء الـ Modal
                                        }
                                    }

                                    // دالة لإرسال الـ ID إلى الخادم (اختياري)
                                    function sendIdToServer(id) {
                                        // هنا يمكنك إرسال البيانات إلى الخادم باستخدام fetch أو axios
                                        console.log("إرسال الـ ID إلى الخادم: ", id);
                                    }



                                    // تهيئة List.js
                                    const clientListOptions = {
                                        valueNames: ['name', 'phone', 'email'], // تأكد من أن الفئات هنا تطابق تلك التي في الـ HTML
                                    };

                                    const clientList = new List('clientsTable', clientListOptions);

                                    // بحث المستخدم
                                    document.getElementById('searchInput').addEventListener('keyup', function() {
                                        clientList.search(this.value);
                                    });
                                </script>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include JavaScript -->
    <script src="{{asset('dashboard/js/clients.js')}}"></script>
</body>

</html>
