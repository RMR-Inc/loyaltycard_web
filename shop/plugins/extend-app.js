import extend from '~/utils/loyaltycard-extend'

export default async function ({ app }) {
	extend(app, {
		mounted () {
			document.dispatchEvent(new Event('start'));
		},
	})
}