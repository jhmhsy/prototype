const qrInput = document.getElementById("qrInput");
const qrImage = document.getElementById("qrImage");

qrInput.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            qrImage.src = e.target.result; // Set the src to the file's data URL
            qrImage.style.display = "block"; // Show the image
        };
        reader.readAsDataURL(file); // Read the file as a data URL
    }
});

document
    .getElementById("qrInput")
    .addEventListener("change", handleFileSelect, false);
document
    .getElementById("copyButton")
    .addEventListener("click", copyToClipboard);

//copy button
function copyToClipboard() {
    const resultText = document.getElementById("result").innerText;
    navigator.clipboard
        .writeText(resultText)
        .then(() => {
            console.log("Text copied to clipboard:", resultText);
        })
        .catch((err) => {
            console.error("Could not copy text: ", err);
        });
}

function handleFileSelect(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
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
                const code = jsQR(
                    imageData.data,
                    imageData.width,
                    imageData.height
                );

                if (code) {
                    document.getElementById("result").innerText =
                        "Decoded QR Code:";
                    document.getElementById("encryptedInput").value = code.data;
                    sendToServer(code.data);
                } else {
                    document.getElementById("result").innerText =
                        "No QR code found in the image.";
                    document.getElementById("encryptedInput").value = "";
                }
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
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
