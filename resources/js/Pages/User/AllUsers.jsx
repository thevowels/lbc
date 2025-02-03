import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function AllUsers({users}){
    return(
            <AuthenticatedLayout>
                <div className="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                    <h1>All Users</h1>
                    {users.map(user => 
                        <h1>{user.name}</h1>
                    )}
                </div>

            </AuthenticatedLayout>
    )
}