<div
    x-data="{
        toasts: [],
        add(toast) {
            const id = Date.now();
            this.toasts.push({ ...toast, id });

            if (toast.timeout !== false) {
                setTimeout(() => this.remove(id), toast.timeout || 3000);
            }
        },
        remove(id) {
            const index = this.toasts.findIndex(t => t.id === id);
            if (index > -1) {
                this.toasts.splice(index, 1);
            }
        }
    }"
    @toast.window="add($event.detail)"
    class="fixed top-4 right-4 z-50 space-y-2"
    style="pointer-events: none;"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="true"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform translate-x-full"
            @click="remove(toast.id)"
            class="max-w-sm w-full shadow-lg rounded-lg pointer-events-auto cursor-pointer overflow-hidden border"
            :class="{
                'bg-green-50 border-green-200': toast.type === 'success',
                'bg-red-50 border-red-200': toast.type === 'error',
                'bg-blue-50 border-blue-200': toast.type === 'info',
                'bg-yellow-50 border-yellow-200': toast.type === 'warning'
            }"
        >
            <div class="p-4">
                <div class="flex items-start">
                    <!-- Icon -->
                    <div class="flex-shrink-0">
                        <!-- Success Icon -->
                        <template x-if="toast.type === 'success'">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </template>

                        <!-- Error Icon -->
                        <template x-if="toast.type === 'error'">
                            <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </template>

                        <!-- Info Icon -->
                        <template x-if="toast.type === 'info'">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </template>

                        <!-- Warning Icon -->
                        <template x-if="toast.type === 'warning'">
                            <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </template>
                    </div>

                    <!-- Content -->
                    <div class="ml-3 flex-1">
                        <p
                            class="text-sm font-medium"
                            :class="{
                                'text-green-900': toast.type === 'success',
                                'text-red-900': toast.type === 'error',
                                'text-blue-900': toast.type === 'info',
                                'text-yellow-900': toast.type === 'warning'
                            }"
                            x-text="toast.title"
                        ></p>
                        <template x-if="toast.description">
                            <p
                                class="mt-1 text-sm"
                                :class="{
                                    'text-green-700': toast.type === 'success',
                                    'text-red-700': toast.type === 'error',
                                    'text-blue-700': toast.type === 'info',
                                    'text-yellow-700': toast.type === 'warning'
                                }"
                                x-text="toast.description"
                            ></p>
                        </template>
                    </div>

                    <!-- Close Button -->
                    <div class="ml-4 flex-shrink-0 flex">
                        <button
                            @click.stop="remove(toast.id)"
                            class="inline-flex rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2"
                            :class="{
                                'text-green-500 hover:text-green-600 focus:ring-green-500': toast.type === 'success',
                                'text-red-500 hover:text-red-600 focus:ring-red-500': toast.type === 'error',
                                'text-blue-500 hover:text-blue-600 focus:ring-blue-500': toast.type === 'info',
                                'text-yellow-500 hover:text-yellow-600 focus:ring-yellow-500': toast.type === 'warning'
                            }"
                        >
                            <span class="sr-only">Close</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
