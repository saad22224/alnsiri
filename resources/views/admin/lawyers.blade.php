@extends('admin.layouts.sidebar')

<!-- Lawyers Count Card -->
<div class="mb-4 bg-white shadow-sm rounded-lg p-4">
    <div class="flex items-center gap-3">
        <div class="p-3 bg-blue-100 rounded-full">
            <i class="fas fa-user text-blue-600 text-xl"></i>
        </div>
        <div>
            <p class="text-gray-600">إجمالي المحامين</p>
            <h2 id="totalLawyers" class="text-2xl font-bold">{{$lawyers->total()}}</h2>
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

<!-- Lawyers Table -->
<div class="overflow-x-auto">
    <table id="table" class="w-full whitespace-nowrap">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">الرقم التعريفي</th>
                <th class="p-2">الاسم</th>
                <th class="p-2">رقم الهاتف</th>
                <th class="p-2">البريد الإلكتروني</th>
                <th class="p-2">التخصصات</th>
                <th class="p-2">تاريخ الانضمام</th>
                <th class="p-2">الحالة</th>
                <th class="p-2">الأسئلة المجاب عليها</th>
                <th class="p-2">المبلغ المنفق</th>
                <th class="p-2">العملاء المشترى</th>
                <th class="p-2">الإجراءات</th>
            </tr>
        </thead>
        <tbody id="" class="text-sm">
            <!-- ثابتة -->

            @foreach($lawyers as $index => $lawyer)
            <tr class="border-b lawyer" data-name="{{ $lawyer->name }}" data-phone="{{ $lawyer->phone }}" data-email="{{ $lawyer->email }}">

                <td class="p-2">{{ $index + 1}}</td>
                <td class="p-2">{{$lawyer->first_name}}</td>
                <td class="p-2">{{$lawyer->phone_number}}</td>
                <td class="p-2 truncate max-w-[200px]">{{$lawyer->email}}</td>
                <td class="p-2">
                    <div class="bg-blue-50 p-1 rounded text-sm truncate max-w-[200px] mb-1">
                        القانون التجاري
                    </div>
                    <div class="bg-blue-50 p-1 rounded text-sm truncate max-w-[200px] mb-1">
                        قانون الشركات
                    </div>
                </td>
                <td class="p-2">{{\Carbon\carbon::parse($lawyer->created_at)->todatestring()}}</td>
                <td class="p-2">
                    <div class="px-2 py-1 rounded-full text-center text-sm bg-green-100 text-green-800">
                        متصل
                    </div>
                </td>
                <td class="p-2">45 سؤال</td>
                <td class="p-2">2,500 ريال</td>
                <td class="p-2">23</td>
                <td class="p-2">
                    <div class="flex items-center gap-4">
                    <form action="{{route('lawyers.update' , $lawyer->id)}}" method="post">
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
                        <button
                            onclick="showClientDetails({{ $lawyer->id }})"
                            class="px-4 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors text-sm flex items-center gap-1">
                            <i class="fas fa-eye"></i> عرض التفاصيل
                        </button>
                    </div>
                </td>
            </tr>




            <!-- Modal Container (مخفي افتراضيًا) -->
            <div id="lawyerModal{{ $lawyer->id }}" class="hidden fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center" style="z-index: 300;">
                <div class="bg-white p-6 rounded-md shadow-lg max-w-4xl w-full">
                    <!-- محتوى الـ Modal -->
                    <div id="modalContent{{ $lawyer->id }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-3 rounded">
                                <p class="text-gray-600 mb-1">الرقم التعريفي</p>
                                <p class="font-semibold" id="lawyerId{{$lawyer->id}}">{{$lawyer->id}}</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded">
                                <p class="text-gray-600 mb-1">الاسم</p>
                                <p class="font-semibold">{{$lawyer->first_name}}</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded">
                                <p class="text-gray-600 mb-1">رقم الهاتف</p>
                                <p class="font-semibold">{{$lawyer->phone_number}}</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded">
                                <p class="text-gray-600 mb-1">البريد الإلكتروني</p>
                                <p class="font-semibold">{{$lawyer->email}}</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded">
                                <p class="text-gray-600 mb-1">تاريخ الانضمام</p>
                                <p class="font-semibold">{{ \Carbon\Carbon::parse($lawyer->created_at)->toDateString() }}</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded">
                                <p class="text-gray-600 mb-1">الحالة</p>
                                <span class="inline-block px-4 py-1 rounded-full text-sm font-medium ">

                                </span>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded mt-4">
                            <p class="text-gray-600 mb-2">التخصصات</p>
                            <div class="space-y-2">

                                <div class="bg-white p-2 rounded shadow-sm">
2
                                </div>

                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div class="bg-gray-50 p-3 rounded">
                                <p class="text-gray-600 mb-1">الأسئلة المجاب عليها</p>
                                <p class="font-semibold">1</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded">
                                <p class="text-gray-600 mb-1">المبلغ المنفق</p>
                                <p class="font-semibold">1 ريال</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded">
                                <p class="text-gray-600 mb-1">العملاء المشترى</p>
                                <p class="font-semibold">1</p>
                            </div>
                        </div>

                        <!-- زر إغلاق الـ Modal -->
                        <button onclick="closeModal({{ $lawyer->id }})" class="mt-4 px-4 py-2 bg-red-500 text-white rounded-md">
                            إغلاق
                        </button>
                    </div>

                </div>

            </div>
            </td>
            </tr>
            @endforeach
            {{ $lawyers->links() }}
        </tbody>
    </table>
</div>
<script>

</script>

<!-- Include JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('dashboard/js/lawyers.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</body>

</html>
