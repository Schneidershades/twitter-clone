<template>
	<div class="flex w-full">
		<div class="mr-3">
			<img :src="tweet.user.avatar" class="w-12 rounded-full">
		</div>
		<div class="flex-grow">
			<app-tweet-username :user="tweet.user" />
			<p class="text-gray-300 whitespace-pre-wrap">{{ tweet.body }}</p>

			<ul class="flex mt-4">
				<li class="w-3/12">
					<a href="">
						icon
					 	<span></span>
					</a>
				</li>

				<li class="w-3/12">
					 retweet
				</li>
				<li class="w-3/12">
					 like
				</li>
			</ul>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			tweet : {
				required : true,
				type : Object
			}
		}
	}
</script>