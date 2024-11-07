function monthInputLimit(input) {
    let value = input.value;

    // If the value is "0", change it to "1"
    if (value === "0") {
        input.value = 1;
    }

    // Ensure the value is numeric and within the 1-12 range
    if (value > 12) {
        input.value = 12;
    }

    // Prevent typing more than two digits (e.g., "13" or beyond)
    if (value.length > 2) {
        input.value = value.slice(0, 2);
    }
}

function priceInputLimit(input) {
    let value = input.value;

    // If the value is "0", change it to "1"
    if (value === "0") {
        input.value = 1;
    }

    // Ensure the value is numeric and within the 1-50,000 range
    if (value > 50000) {
        input.value = 50000;
    }

    // Prevent typing more than five digits (e.g., "50001" or beyond)
    if (value.length > 5) {
        input.value = value.slice(0, 5);
    }
}
