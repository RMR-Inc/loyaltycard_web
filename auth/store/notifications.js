export let state = () => ({
    list: [],
})

export const getters = {

}

export const mutations = {
    add(state, notification){
        notification.id = Math.random().toString().substr(2, 8);
        notification.hide = false;
        state.list.push(notification);
    },
    remove(state, notification){
        state.list = state.list.filter(n => { return n.id != notification.id });
    },
    hide(state, notification) {
        const sNotification = state.list.find(n => n.id == notification.id);
        Object.assign(sNotification, {hide: true});
    }
}

export const actions = {
    remove(state, notification){
        state.commit("hide", notification);
        setTimeout(() => {state.commit("remove", notification)}, 500);
    },
    add(state, notification){
        state.commit("add", notification);
        setTimeout(() => {state.dispatch("remove", notification)}, notification.displayTime || 2500);
    }
}

export const modules = {

}
