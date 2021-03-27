<x-app-layout>
    <div class="grid gap-6 my-8 md:grid-cols-2">

        <div
            class="min-w-0 p-4 bg-white rounded-lg shadow dark:bg-gray-800"
        >
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                General statistics
            </h4>
            <div class="border-t py-4"><p>Total number of employees: <span class="font-semibold text-lg">{{ $employeeCount }}</span></p></div>
            <div class="border-t py-4"><p>Average age of employees: <span class="font-semibold text-lg">{{ $averageAge }}</span></p></div>
            <div class="border-t py-4"><p>Average wage: <span class="font-semibold text-lg">{{ $averageWage }}</span></p></div>
            <div class="border-t py-4"><p>Average experience: <span class="font-semibold text-lg">{{ $averageExp }}</span></p></div>
        </div>

        <!-- Doughnut/Pie chart -->
        <div
            class="min-w-0 p-4 bg-white rounded-lg shadow dark:bg-gray-800"
        >
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Employees per department
            </h4>
            <canvas id="1"></canvas>
        </div>

        <div
            class="min-w-0 p-4 bg-white rounded-lg shadow dark:bg-gray-800"
        >
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Employees per active status
            </h4>
            <canvas id="2"></canvas>
        </div>

        <div
            class="min-w-0 p-4 bg-white rounded-lg shadow dark:bg-gray-800"
        >
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Employees per contract type
            </h4>
            <canvas id="3"></canvas>
        </div>
    </div>
</x-app-layout>
