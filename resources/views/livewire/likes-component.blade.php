<div class="post-rate">
    <div class="like">
        <i class="far fa-thumbs-up" wire:click="like" ></i>
    </div>
    <span class="like-rate">
        {{$post->likes_count }}
    </span>
    <div class="dislike">
        <i class="far fa-thumbs-down" wire:click="dislike"></i>
    </div>
</div>
