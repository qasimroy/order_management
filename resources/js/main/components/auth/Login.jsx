import axios from "../../../bootstrap";
import React, { useEffect, useState } from "react";
import { AiOutlineEye, AiOutlineEyeInvisible } from "react-icons/ai";
import { useNavigate } from "react-router-dom";

export const Login = () => {
    const [show, setShow] = useState(false);
    const navigate = useNavigate();

    useEffect(() => {
        document.title = "Login";
    });

    const [formData, setFormData] = useState({
      email: '',
      password: ''
    });

    const handleChange = (e) => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async (e) => {
      e.preventDefault();
      try {
        await axios.get('/sanctum/csrf-cookie');

        
        const response = await fetch('http://127.0.0.1:8000/api/auth/login', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-XSRF-TOKEN': axios.defaults.headers.common['X-XSRF-TOKEN']
                // 'X-XSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(formData),
            credentials: 'include'
        });

        const data = await response.json();
        console.log(data);
      } catch (error) {
          console.error(error);
      }
  };

    return (
        <>
            <div className="h-screen flex bg-white justify-center items-center  ">
                <form className="w-full md:w-1/3 rounded-3xl bg-blue-950 items-center" onSubmit={handleSubmit}>
                    <div className="flex font-bold justify-center mt-6">
                        <h1 className="text-3xl text-center text-white mb-4">
                            Login
                        </h1>
                    </div>
                    <div className="px-12 pb-10">
                        <div className="w-full mb-2">
                            <div className="py-2">
                                <label
                                    className="text-lg text-white"
                                    htmlFor="Email"
                                >
                                    Email:
                                </label>
                            </div>
                            <div className="flex justify-center">
                                <input
                                    type="email"
                                    placeholder="Email"
                                    name="email"
                                    value={formData.email}
                                    onChange={handleChange}
                                    className="px-8  w-full border rounded py-2 text-gray-700 focus:outline-none"
                                    required
                                />
                            </div>
                        </div>
                        <div className="w-full mb-2">
                            <div className="py-2">
                                <label
                                    className="text-lg text-white"
                                    htmlFor="password"
                                >
                                    Password:
                                </label>
                            </div>
                            <div className="flex justify-center relative">
                                <input
                                    type={!show ? "password" : "text"}
                                    placeholder="Password"
                                    name="password"
                                    value={formData.password}
                                    onChange={handleChange}
                                    className="px-8 w-full border rounded py-2 text-gray-700 focus:outline-none"
                                    required
                                />
                                <span
                                    className="absolute top-0 right-0 bg-blue-950 bg-opacity-20 p-[11px]"
                                    onClick={() => setShow(!show)}
                                >
                                    {!show ? (
                                        <AiOutlineEye className="text-blue-950 text-xl" />
                                    ) : (
                                        <AiOutlineEyeInvisible className="text-blue-950 text-xl" />
                                    )}
                                </span>
                            </div>
                        </div>
                        <div className="py-4">
                            <button
                                type="submit"
                                className="border-[1px] flex justify-center text-center cursor-pointer p-2 w-[100%] rounded border-white text-lg text-white hover:bg-white
                                    hover:text-blue-950"
                                // onClick={() => {
                                //     navigate("/");
                                // }}
                            >
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </>
    );
};