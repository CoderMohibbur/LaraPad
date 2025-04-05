<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div class="p-5 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Total Users</h3>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">1,234</p>
                        </div>
                        <div class="text-blue-500 dark:text-blue-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20h6M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                        </div>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="p-5 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Sales Today</h3>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">$3,580</p>
                        </div>
                        <div class="text-green-500 dark:text-green-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="p-5 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">New Orders</h3>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">57</p>
                        </div>
                        <div class="text-yellow-500 dark:text-yellow-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18v18H3V3z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="p-5 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-gray-500 dark:text-gray-400 text-sm">Site Visits</h3>
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">12,345</p>
                        </div>
                        <div class="text-red-500 dark:text-red-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Extra Sections -->
            <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Activity -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-white mb-4">Recent Activity</h4>
                    <ul class="space-y-3">
                        <li class="text-gray-600 dark:text-gray-300">✅ John Doe registered 5 mins ago</li>
                        <li class="text-gray-600 dark:text-gray-300">🛒 New order placed #1123</li>
                        <li class="text-gray-600 dark:text-gray-300">📦 Order #1120 shipped</li>
                        <li class="text-gray-600 dark:text-gray-300">💬 Support ticket answered</li>
                    </ul>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-gray-700 dark:text-white mb-4">Quick Actions</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="#" class="text-center p-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600">➕ New User</a>
                        <a href="#" class="text-center p-4 bg-green-500 text-white rounded-lg hover:bg-green-600">📦 New Order</a>
                        <a href="#" class="text-center p-4 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">📝 New Post</a>
                        <a href="#" class="text-center p-4 bg-red-500 text-white rounded-lg hover:bg-red-600">⚙️ Settings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6 px-4 mx-auto max-w-7xl lg:px-8">
        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Total Users</h3>
                <p class="mt-2 text-3xl font-bold text-blue-600 dark:text-blue-400">1,205</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Orders</h3>
                <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">320</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Revenue</h3>
                <p class="mt-2 text-3xl font-bold text-yellow-600 dark:text-yellow-400">$7,240</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Visitors</h3>
                <p class="mt-2 text-3xl font-bold text-red-600 dark:text-red-400">12,500</p>
            </div>
        </div>

        {{-- Chart Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Sales Overview</h3>
                <canvas id="salesChart" class="w-full h-64"></canvas>
            </div>
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">User Growth</h3>
                <canvas id="usersChart" class="w-full h-64"></canvas>
            </div>
        </div>

        {{-- Recent Activities & Users --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Recent Activities</h3>
                <ul class="space-y-4">
                    <li class="text-gray-700 dark:text-gray-300">✅ John registered - 2 mins ago</li>
                    <li class="text-gray-700 dark:text-gray-300">🛒 Order #456 placed - 10 mins ago</li>
                    <li class="text-gray-700 dark:text-gray-300">📧 New contact form submitted</li>
                </ul>
            </div>
            <div class="bg-white rounded-lg shadow p-6 dark:bg-gray-800">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Latest Users</h3>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    <li class="py-2 flex items-center justify-between text-gray-700 dark:text-gray-300">
                        <span>Jane Doe</span><span class="text-sm text-gray-500">jane@example.com</span>
                    </li>
                    <li class="py-2 flex items-center justify-between text-gray-700 dark:text-gray-300">
                        <span>Ahmed Hossain</span><span class="text-sm text-gray-500">ahmed@gmail.com</span>
                    </li>
                    <li class="py-2 flex items-center justify-between text-gray-700 dark:text-gray-300">
                        <span>Sarah Khan</span><span class="text-sm text-gray-500">sarah@live.com</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- ChartJS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const salesChart = new Chart(document.getElementById('salesChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Sales',
                    backgroundColor: '#3B82F6',
                    data: [1200, 1500, 1700, 2000, 1900],
                }]
            },
        });

        const usersChart = new Chart(document.getElementById('usersChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Users',
                    backgroundColor: 'rgba(34,197,94,0.2)',
                    borderColor: '#22C55E',
                    data: [200, 450, 700, 900, 1200],
                }]
            },
        });


        
</x-app-layout>
