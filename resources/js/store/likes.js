import { without } from 'lodash'

export default {
	namespaced: true,

	state: {
		likes: []
	},

	getters: {
		likes (state) {
			return state.likes
		}
	},

	mutations : {
		PUSH_LIKES (state, data) {
			state.likes.push( ...data )
		},

		PUSH_LIKE (state, id) {
			state.likes.push( id )
			console.log(state.likes)
		},

		POP_LIKE (state, id) {
			state.likes = without( state.likes, id )
			console.log(state.likes)
		}
	},

	actions : {
		async likeTweet (_, tweet) {
			await axios.post(`/api/tweets/${tweet.id}/likes`)
		},

		async unlikeTweet (_, tweet) {
			await axios.delete(`/api/tweets/${tweet.id}/likes`)
		},

		async syncLike ({ commit, state }, id) {
			// does like exists
			if (state.likes.includes(id)) {
				console.log('remove')
				commit('POP_LIKE', id)
				return
			}
			console.log('push')
			commit('PUSH_LIKE', id)
		}
	}
}

