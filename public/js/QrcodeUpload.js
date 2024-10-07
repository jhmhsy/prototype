const qrInput = document.getElementById("qrInput");
const qrImage = document.getElementById("qrImage");
const qrInputLabel = document.querySelector('label[for="qrInput"]');

function handleImageUpload(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            qrImage.src = e.target.result;
            qrImage.style.display = "block";
            qrInputLabel.style.display = "none";
            processQRCode(e.target.result);
        };
        reader.readAsDataURL(file);
    }
}

qrInput.addEventListener("change", handleImageUpload);

qrImage.addEventListener("click", function () {
    qrInput.click();
});

function processQRCode(imageData) {
    const img = new Image();
    img.onload = function () {
        const canvas = document.createElement("canvas");
        const context = canvas.getContext("2d");
        canvas.width = img.width;
        canvas.height = img.height;
        context.drawImage(img, 0, 0, img.width, img.height);
        const imageData = context.getImageData(
            0,
            0,
            canvas.width,
            canvas.height
        );
        const code = jsQR(imageData.data, imageData.width, imageData.height);

        if (code) {
            document.getElementById("encryptedInput").value = code.data;
            sendToServer(code.data);
        } else {
            document.getElementById("encryptedInput").value = "";
        }
    };
    img.src = imageData;
}

function sendToServer(data) {
    const formData = new FormData();
    formData.append("qr_code", document.getElementById("qrInput").files[0]);
    formData.append("decoded_data", data);

    fetch('{{ route("uploader.handle") }}', {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => console.log(data))
        .catch((error) => console.error("Error:", error));
}
