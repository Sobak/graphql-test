pipeline {
  agent any
  stages {
    stage('Test') {
      agent {
        dockerfile {
          filename 'Dockerfile'
        }

      }
      steps {
        echo 'Running tests'
      }
    }
  }
}