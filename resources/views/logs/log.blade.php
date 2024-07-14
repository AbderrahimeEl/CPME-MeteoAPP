<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white min-h-[90%] overflow-hidden shadow-sm sm:rounded-lg p-2">
            <h1 class="text-2xl font-semibold mb-6">Materials Log actions</h1>
            <div class="mb-4">
                <label for="log-filter" class="block text-sm font-medium text-gray-700">Filter Logs</label>
                <select id="log-filter"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="all">All Logs</option>
                    <option value="materials">Material Logs</option>
                    <option value="interventions">Intervention Logs</option>
                    <option value="users">User Logs</option>
                </select>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Details</th>
                    </tr>
                </thead>
                <tbody id="logs" class="bg-white divide-y divide-gray-200">
                    @foreach (array_reverse($logs) as $log)
                        <tr class="log-entry">
                            <td class="log-date px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $log }}
                            </td>
                            <td class="log-action px-6 py-4 whitespace-nowrap text-sm"></td>
                            <td class="log-details px-6 py-4 whitespace-nowrap text-sm"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('script khdaam');
            const logEntries = document.querySelectorAll('.log-entry');
            const logFilter = document.getElementById('log-filter');

            function processLogEntries() {
                logEntries.forEach(logEntry => {
                    const logText = logEntry.querySelector('.log-date').textContent.trim();
                    const regex = /^\[(.*?)\] .*: (.*?)( \{.*\})?$/;
                    const match = logText.match(regex);

                    if (match) {
                        const date = match[1];
                        const action = match[2];
                        const details = match[3] || '';
                        console.log('Match found:', {
                            date,
                            action,
                            details
                        });

                        logEntry.querySelector('.log-date').textContent = `[${date}]`;
                        logEntry.querySelector('.log-action').textContent = action;
                        logEntry.querySelector('.log-details').textContent = details;

                        const actionElement = logEntry.querySelector('.log-action');
                        if (action.includes('Material added') || action.includes('user added') || action
                            .includes('intervention added')) {
                            actionElement.style.color = 'green';
                        } else if (action.includes('Material updated') || action.includes('user updated') ||
                            action.includes('intervention updated')) {
                            actionElement.style.color = 'blue';
                        } else if (action.includes('Material deleted') || action.includes('user deleted') ||
                            action.includes('intervention deleted')) {
                            actionElement.style.color = 'red';
                        } else {
                            actionElement.style.color = 'black';
                        }
                    } else {
                        console.log('No match found for log entry:', logText);
                    }
                });
            }

            function filterLogs() {
                const filterValue = logFilter.value;
                console.log('Filtering logs by:', filterValue);

                logEntries.forEach(logEntry => {
                    const actionText = logEntry.querySelector('.log-action').textContent.trim();
                    logEntry.style.display = 'table-row';

                    if (filterValue === 'materials' && !actionText.includes('Material')) {
                        logEntry.style.display = 'none';
                    } else if (filterValue === 'interventions' && !actionText.includes('intervention')) {
                        logEntry.style.display = 'none';
                    } else if (filterValue === 'users' && !actionText.includes('user')) {
                        logEntry.style.display = 'none';
                    }
                });
            }

            processLogEntries();

            logFilter.addEventListener('change', filterLogs);

            filterLogs();
        });
    </script>
</x-app-layout>
