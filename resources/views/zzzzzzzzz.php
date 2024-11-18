body class="bg-background text-foreground min-h-screen flex items-start justify-center p-4">
<div class="flex flex-col md:flex-row max-w-4xl w-full mx-auto space-y-4 md:space-y-0 md:space-x-4">
    <div class="w-full md:w-1/2 p-6 bg-card text-card-foreground rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-primary-foreground">User Information</h2>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-muted-foreground">Name</label>
                <p class="text-lg">Jane Smith</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-muted-foreground">Email</label>
                <p class="text-lg">janesmith@example.com</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-muted-foreground">Facebook</label>
                <p class="text-lg">facebook.com/janesmith</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-muted-foreground">Membership</label>
                <p class="text-lg">VIP Member</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-muted-foreground">Membership Duration</label>
                <p class="text-lg">02/15/2023 - 02/14/2024</p>
            </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 p-6 bg-card text-card-foreground rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-primary-foreground">Service Details</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b border-muted-foreground py-2 px-4 text-sm font-medium text-muted-foreground">
                        Service Type</th>
                    <th class="border-b border-muted-foreground py-2 px-4 text-sm font-medium text-muted-foreground">
                        Month</th>
                    <th class="border-b border-muted-foreground py-2 px-4 text-sm font-medium text-muted-foreground">
                        Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-b border-muted-foreground py-2 px-4 text-lg">Premium</td>
                    <td class="border-b border-muted-foreground py-2 px-4 text-lg">January</td>
                    <td class="border-b border-muted-foreground py-2 px-4 text-lg text-accent-foreground">Active</td>
                </tr>
                <tr>
                    <td class="border-b border-muted-foreground py-2 px-4 text-lg">Standard</td>
                    <td class="border-b border-muted-foreground py-2 px-4 text-lg">February</td>
                    <td class="border-b border-muted-foreground py-2 px-4 text-lg text-destructive-foreground">Inactive
                    </td>
                </tr>
                <tr>
                    <td class="border-b border-muted-foreground py-2 px-4 text-lg">Basic</td>
                    <td class="border-b border-muted-foreground py-2 px-4 text-lg">March</td>
                    <td class="border-b border-muted-foreground py-2 px-4 text-lg text-accent-foreground">Active</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>