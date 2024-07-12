<x-app-layout>
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="bg-white min-h-[90%] overflow-hidden shadow-sm sm:rounded-lg p-2">
            <h1 class="text-2xl font-semibold mb-6">Materials Log actions</h1>
            <ul id="logs" class="divide-y divide-gray-200">
                @foreach (array_reverse($logs) as $log)
                    <li class="py-1 log-entry">
                        <p class="text-gray-800">{{ $log }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('script khdaam');
            const logEntries = document.querySelectorAll('.log-entry');
            console.log('Log entries found:', logEntries.length);

            logEntries.forEach(logEntry => {
                const logText = logEntry.textContent.trim();
                console.log('Processing log entry:', logText);
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

                    logEntry.innerHTML = `
                        <span class="log-date" style="color: gray;">[${date}]</span>
                        <span class="log-action">${action}</span>
                        <span class="log-details">${details}</span>
                    `;

                    // Style the action based on its type
                    const actionElement = logEntry.querySelector('.log-action');
                    if (action.includes('Material added')||action.includes('user added')||action.includes('intervention added')) {
                        actionElement.style.color = 'green';
                    } else if (action.includes('Material updated')||action.includes('user updated')||action.includes('intervention updated')) {
                        actionElement.style.color = 'blue';
                    } else if (action.includes('Material deleted')||action.includes('user deleted')||action.includes('intervention deleted')) {
                        actionElement.style.color = 'red';
                    } else {
                        actionElement.style.color = 'black';
                    }
                } else {
                    console.log('No match found for log entry:', logText);
                }
            });
        });
    </script>
</x-app-layout>
