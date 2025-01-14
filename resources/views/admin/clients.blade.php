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
                <h2 id="totalClients" class="text-2xl font-bold">{{$clients->total()}}</h2>
            </div>
        </div>
    </div>
    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Toastify({
                text: "{{ session('success') }}",
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
        });
    </script>
    @endif
    @if (session('failed'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Toastify({
                text: "{{ session('failed') }}",
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
        });
    </script>
    @endif
    <!-- Search Input -->
    <div class="mb-4">
        <input
            id="search"
            type="text"
            placeholder="البحث في جميع الحقول"
            class="w-full md:w-64 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
    </div>

    <!-- Clients Table -->
    <div class="overflow-x-auto">
        <table id="myTable" class="w-full whitespace-nowrap">
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
                    <td>
                        <ul>
                            @foreach ($client->questions as $question)
                            <li>{{ $question->question_title }}</li> <!-- استبدل "content" باسم العمود الذي يحتوي على نص السؤال -->
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach ($client->chances as $chance)
                            <li>{{ $chance->case_details }}</li> <!-- استبدل "content" باسم العمود الذي يحتوي على نص السؤال -->
                            @endforeach
                        </ul>
                    </td>
                    <td class="p-2">
                        <div class="flex items-center gap-4">
                            <form action="{{route('clients.update' , $client->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <button
                                    onclick="toggleStatus(1)"
                                    class="relative inline-flex items-center justify-center w-24 h-8 rounded-full transition-all duration-200 focus:outline-none bg-green-500"
                                    id="toggleButton-1">
                                    <span id="statusText-1" class="absolute z-10 text-xs font-medium transition-all duration-200 text-white">
                                        نشط
                                    </span>
                                    <span id="buttonIcon-1" class="absolute w-6 h-6 bg-white rounded-full shadow transition-all duration-200 right-1"></span>
                                </button>
                            </form>
                            <!-- زر عرض التفاصيل -->
                            <button
                                onclick="showClientDetails({{ $client->id }})"
                                class="px-4 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors text-sm flex items-center gap-1">
                                <i class="fas fa-eye"></i> عرض التفاصيل
                            </button>

                            <!-- Modal Container (مخفي افتراضيًا) -->
                            <div id="clientModal{{ $client->id }}" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center" style="z-index: 1000;">
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
                                                @foreach ($client->questions as $question)
                                                <li>{{ $question->question_title }}</li> <!-- استبدل "content" باسم العمود الذي يحتوي على نص السؤال -->
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 p-3 rounded mt-4">
                                        @foreach ($client->chances as $chance)
                            <li>{{ $chance->case_details }}</li> <!-- استبدل "content" باسم العمود الذي يحتوي على نص السؤال -->
                            @endforeach
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

                        </div>
                    </td>
                </tr>
                @endforeach
                {{ $clients->links() }}
            </tbody>
        </table>
    </div>
</div>

<!-- Include JavaScript -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('dashboard/js/clients.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>
