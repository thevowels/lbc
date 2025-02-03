import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

import { Head } from "@inertiajs/react";
export default function Profile({auth, user}){
    return(
        <AuthenticatedLayout>
            <Head title="User Profile" />
            <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <h1>{user.name}</h1>
                <h2>{user.email}</h2>
                <h2>Welcome to the site {user.name}</h2>
            </div>
        </AuthenticatedLayout>
    )
}