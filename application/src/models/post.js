import Api from 'services/Api';

export default {
    items () {
        return Api.get('/posts');
    },
    item (id) {
        return Api.get(`/posts/${id}`);
    }
};
