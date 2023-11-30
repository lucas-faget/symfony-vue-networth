import axios from 'axios';

export const fetchUsers = async () => {
    try {
        const response = await axios.get(`https://localhost:8000/api/users`);
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};

export const fetchUser = async (id: string) => {
    try {
        const response = await axios.get(`https://localhost:8000/api/users/${id}`);
        console.log(response.data)
        return response.data;
    } catch (error) {
        console.error(error);
        throw error;
    }
};
