<section class="bg-white py-8 lg:py-16">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900">
                Discussion (3)
            </h2>
        </div>
        {{--  comment body --}}
        @foreach ($comments as $comment)
            @livewire('comment', ['comment' => $comment], key($comment->id))
        @endforeach

        {{-- main comment form --}}
        <form class="mb-6">
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea style="resize: none;" placeholder="Write a comment..." required rows="4"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none"></textarea>
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-blue-800">
                Comment
            </button>
        </form>

    </div>
</section>
