<x-dashboard-tile :position="$position" :fade="false">
	<div wire:poll.{{ $refreshIntervalInSeconds }}s>
		<div class="flex flex-wrap -mx-1 overflow-hidden">
			<div class="my-1 px-1 w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2">
				<div class="grid gap-4 justify-items-center h-full text-center">
					<div class="font-medium text-dimmed text-sm tracking-wide uppercase tabular-nums">
						CUSTOMERS
					</div>
					<div class="self-center font-bold text-4xl tracking-wide leading-none">
						{{ $shopify['customers']['count'] }}
					</div>
					<div class="text-dimmed text-xs">
						@isset ($shopify['customers']['latest']['first_name'])
						{{ ucfirst($shopify['customers']['latest']['first_name']) }}
						@else
						Last
						@endif
						registered {{ \Carbon\Carbon::parse($shopify['customers']['latest']['created_at'])->diffForHumans() }}
					</div>
				</div>
			</div>
			<div class="my-1 px-1 w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2">
				<div class="grid gap-4 justify-items-center h-full text-center">
					<div class="font-medium text-dimmed text-sm tracking-wide uppercase tabular-nums">
						ORDERS
					</div>
					<div class="self-center font-bold text-4xl tracking-wide leading-none">
						{{ $shopify['orders']['count'] }}
					</div>
					<div class="text-dimmed text-xs">
						{{ $shopify['orders']['latest']['name'] }} created {{ \Carbon\Carbon::parse($shopify['orders']['latest']['created_at'])->diffForHumans() }}
					</div>
				</div>
			</div>
			<div class="my-1 pt-4 px-1 w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2">
				<div class="grid gap-4 justify-items-center h-full text-center">
					<div class="font-medium text-dimmed text-sm tracking-wide uppercase tabular-nums">
						ABANDONED CARTS
					</div>
					<div class="self-center font-bold text-4xl tracking-wide leading-none">
						{{ $shopify['checkouts']['count'] }}
					</div>
					@isset ($shopify['checkouts']['latest']['created_at'])
					<div class="text-dimmed text-xs">
						Last abandoned {{ \Carbon\Carbon::parse($shopify['checkouts']['latest']['created_at'])->diffForHumans() }}
					</div>
					@else
					<div class="text-dimmed text-xs">
						No active abandoned carts
					</div>
					@endisset
				</div>
			</div>
			<div class="my-1 pt-4 px-1 w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2">
				<div class="grid gap-4 justify-items-center h-full text-center">
					<div class="font-medium text-dimmed text-sm tracking-wide uppercase tabular-nums">
						PRODUCTS
					</div>
					<div class="self-center font-bold text-4xl tracking-wide leading-none">
						{{ $shopify['products']['count'] }}
					</div>
				</div>
			</div>
		</div>
	</div>
</x-dashboard-tile>