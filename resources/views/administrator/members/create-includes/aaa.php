<select :name="'service_type_' + i" id="service_type"
    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-peak_1 dark:border-gray-600 dark:text-white sm:text-sm">
    <option value="" selected disabled class="disabled">Choose an
        option
    </option>

    <option value="1month">1 Month -

    </option>
    <option value="1monthstudent">1 Month / Student -

    </option>
    <option value="3month">3 Months -

    </option>
    <option value="6month">6 Months -

    </option>
    <option value="12month">12 Months -

    </option>


    ₱{{ $prices['1month'] ?? 'N/A' }}
    ₱{{ $prices['1monthstudent'] ?? 'N/A' }}
    ₱{{ $prices['3month'] ?? 'N/A' }}
    ₱{{ $prices['6month'] ?? 'N/A' }}
    ₱{{ $prices['12month'] ?? 'N/A' }}
</select>