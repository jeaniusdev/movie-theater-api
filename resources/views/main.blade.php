<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>A2A Test</title>
</head>
<body>

<main>
  <div class="relative isolate overflow-hidden">
    <header class="pb-4 pt-6 sm:pb-6">
      <div class="mx-auto flex max-w-7xl flex-wrap items-center gap-6 px-4 sm:flex-nowrap sm:px-6 lg:px-8">
        <h1 class="text-base font-semibold leading-7 text-gray-900">Top Movie Theater</h1>
        <div class="order-last flex w-full gap-x-8 text-sm font-semibold leading-6 sm:order-none sm:w-auto sm:border-l sm:border-gray-200 sm:pl-6 sm:leading-7">
          <a href="#" class="text-indigo-600">Last 7 days</a>
          <a href="#" class="text-gray-700">Last 30 days</a>
          <a href="#" class="text-gray-700">All-time</a>
        </div>
        <form action="{{ route('theater.show') }}" method="POST" class="ml-auto rounded-md border-gray-300 text-sm flex items-center">
            @csrf
            <input type="date" name="calendar_date" value="{{ $date }}" class="border border-gray-300 rounded-md p-2" required>
            <button type="submit" class="ml-2 flex items-center gap-x-1 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Search
            </button>
        </form>
      </div>
    </header>

    <div class="border-b border-b-gray-900/10 lg:border-t lg:border-t-gray-900/5">
        <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 lg:px-2 xl:px-0">
            @foreach ($theaters as $theater)
            <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                <dt class="text-sm font-medium leading-6 text-gray-500">{{ $theater->name }}</dt>
                <dd class="w-full flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">${{ number_format($theater->sales_sum_amount, 2) }}</dd>
            </div>
            @endforeach
        </dl>
    </div>

    <div class="absolute left-0 top-full -z-10 mt-96 origin-top-left translate-y-40 -rotate-90 transform-gpu opacity-20 blur-3xl sm:left-1/2 sm:-ml-96 sm:-mt-10 sm:translate-y-0 sm:rotate-0 sm:transform-gpu sm:opacity-50" aria-hidden="true">
      <div class="aspect-[1154/678] w-[72.125rem] bg-gradient-to-br from-[#FF80B5] to-[#9089FC]" style="clip-path: polygon(100% 38.5%, 82.6% 100%, 60.2% 37.7%, 52.4% 32.1%, 47.5% 41.8%, 45.2% 65.6%, 27.5% 23.4%, 0.1% 35.3%, 17.9% 0%, 27.7% 23.4%, 76.2% 2.5%, 74.2% 56%, 100% 38.5%)"></div>
    </div>
  </div>

  <div class="space-y-16 py-16 xl:space-y-20">
    <div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="mx-auto max-w-2xl text-base font-semibold leading-6 text-gray-900 lg:mx-0 lg:max-w-none">Movie theater sales</h2>
        </div>
        <div class="mt-6 overflow-hidden border-t border-gray-100">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
                    <table class="w-full text-left">
                        <thead class="sr-only">
                            <tr>
                                <th>Amount</th>
                                <th>Movie Title</th>
                                <th>Theater</th>
                                <th>More Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-sm leading-6 text-gray-900">
                                <th scope="colgroup" colspan="3" class="relative isolate py-2 font-semibold">
                                    <time datetime="{{$date}}">{{ $formattedDate }}</time>
                                    <div class="absolute inset-y-0 right-full -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                                    <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-gray-200 bg-gray-50"></div>
                                </th>
                            </tr>
                            @if($sales->isNotEmpty())
                                @foreach ($sales as $sale)
                                    <tr class="text-sm leading-6 text-gray-900">
                                        <td class="relative py-5 pr-6">
                                            <div class="flex gap-x-6">
                                                <div class="flex-auto">
                                                    <div class="flex items-start gap-x-3">
                                                        <div class="text-sm font-medium leading-6 text-gray-900">${{ number_format($sale->amount, 2) }} USD</div>
                                                        <div class="rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Paid</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden py-5 pr-6 sm:table-cell">
                                            <div class="text-sm leading-6 text-gray-900">{{ $sale->showing->movie->name }}</div>
                                        </td>
                                        <td class="py-5">
                                            <div class="text-sm leading-6 text-gray-900">{{ $sale->showing->theater->name }}</div>
                                        </td>
                                        <td class="py-5 text-right">
                                            <div class="flex justify-end">
                                                <a href="#" class="text-sm font-medium leading-6 text-indigo-600 hover:text-indigo-500">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="py-5">
                                    <div class="bg-gray-50 rounded-lg px-6 py-4">
                                        <div class="mx-auto">
                                            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-2xl">That specific date have no results, but did you know?</h2>
                                            <p class="mt-6 text-lg leading-8 text-gray-600">{{ $message }}</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
</body>
</html>