<x-dash-layout>
    <section class="grid grid-cols-1 gap-5">
        <h1 class="text-4xl pb-5 font-bold dark:text-white">Scan Ticket</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 justify-evenly ">
            <!------------------ UPLOAD SECTION---------------- -->
            <div class="flex flex-col gap-2">
                <div class="rounded-lg w-full max-w-md mx-auto bg-white dark:bg-peak_2">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="text-2xl font-semibold dark:text-white">Upload Image
                        </h3>
                        <p class="text-sm text-basegray">
                            Kindly insert the QR code you received in here.
                        </p>
                    </div>
                    <div class="p-6 grid gap-6 shadow-md dark:shadow-2xl mx-6 ">
                        <div class="">
                            <!-- BUpload Button-->
                            <div>
                                <label for="qrInput"
                                    class="flex flex-col items-center justify-center h-30 space-y-2 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-8 h-8 dark:text-white">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" x2="12" y1="3" y2="15"></line>
                                    </svg>
                                    <p class="text-basegray">Drag and drop an image or click to upload</p>
                                    <input type="file" id="qrInput" accept="image/*" class="hidden">
                                </label>
                            </div>
                            <!-- Image of the uploaded file -->
                            <div class=" max-w-100 max-h-100">
                                <div class="relative w-auto  item-center h-auto  p-5 rounded-md">
                                    <img id="qrImage" alt="Uploaded QR Code"
                                        class="m-auto cursor-pointer hover:bg-white " style="display:none;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- TAKE THE QRCODE RESULT WILL BE RECIEVED HERE TO BE SENT TO CONTROLLER -->
                    <form action="{{ route('ticket.scanticket') }}" method="POST">
                        @csrf
                        <div>
                            <input hidden type="text" id="encryptedInput" name="encrypted_id" readonly
                                placeholder="Encrypted text will appear here">
                        </div>
                        <button type="submit"
                            class="m-10 inline-flex items-center text-sm font-medium hover:text-white hover:bg-blue-700 active:bg-black dark:active:bg-blue-800   bg-coolblue text-white h-11 rounded-md px-40 ">
                            Scan
                        </button>
                    </form>
                </div>
            </div>
            <!---------------- USER DETAILS SECTION ---------------->
            @include ('administrator.ticket.scan-details')
        </div>
    </section>
</x-dash-layout>
<script src="{{ asset('js/QrcodeUpload.js') }}" defer></script>