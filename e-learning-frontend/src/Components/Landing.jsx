import React from "react";
import { AuthInput } from "./AuthInput";
import "../styles/Landing.css";
import AuthButton from "./AuthButton";

const Landing = () => {
    return (
        <>
            <div className="page-container landing-page flex">
                <div className="authentication-container flex gradient-bg round-edges">
                    <div className="authentication-content flex column white-bg round-edges">
                        <div className="login-content flex column">
                            <p className="login-title title">Log In</p>
                            <AuthInput placeholder={"Username"} />
                            <AuthInput placeholder={"Pasword"} />
                            <AuthButton text={"Log in"} />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Landing;
