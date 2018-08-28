import PostModel from 'models/post';

export default {
    namespaced: true,
    actions: {
        items () {
            return PostModel();
        }
    }
};
